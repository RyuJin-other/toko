<?php

namespace App\Controllers;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\KomentarModel;
use App\Models\DiskonModel;
use App\Libraries\Bantuan;

class Shop extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
	private $apiKey = "96f4e938e738a8591585c27c6e72ce95";

    public function __construct()
	{ 
        helper('form'); 
		$this->kategori = new KategoriModel();
        $this->barang = new BarangModel();
        $this->komentar = new KomentarModel();
        $this->diskon = new DiskonModel();
        $this->bantuan = new Bantuan();
	}

	public function index()
	{
		$barang = $this->barang->select('barang.*, kategori.nama AS kategori')->join('kategori', 'barang.id_kategori=kategori.id')->findAll();
        $kategori = $this->kategori->findAll();
        $diskon = $this->diskon->findAll();
		return view('shop/index',[
			'barangs' => $barang,
            'kategoris' => $kategori,
            'diskon' => $diskon,
		]);
	}

    public function category()
	{
		$id = $this->request->uri->getSegment(3);


		$barang = $this->barang->select('barang.*, kategori.nama AS kategori')->where('id_kategori', $id)->join('kategori', 'barang.id_kategori=kategori.id')->where('id_kategori', $id)->findAll(); 
        $kategori = $this->kategori->findAll();
		return view('shop/index',[
			'barangs' => $barang, 
            'kategoris' => $kategori,
		]);
	} 

    public function product()
	{
		$id = $this->request->uri->getSegment(3);

        $barang = $this->barang->find($id); 
        $kategori = $this->kategori->findAll();
        $komentar = $this->komentar->select('komentar.*, user.username')->where('id_barang', $id)->join('user', 'komentar.id_user=user.id')->findAll();

        $provinsi = $this->bantuan->rajaongkir($this->url."province",$this->apiKey,method:"GET");

        $diskon = $this->diskon->findAll();
        $diskons = $this->diskon->find($id);
        
        return view('shop/product',[
            'barang' => $barang, 
            'kategoris' => $kategori,
            'komentars' => $komentar,
            'provinsi'=> json_decode($provinsi)->rajaongkir->results,
            'diskon' => $diskon,
            'diskons' => $diskons,
        ]);
	}
    
    public function getCity()
    {
        if ($this->request->isAJAX()){
            $id_province = $this->request->getGet('id_province');
            $send = ['province'=>$id_province];
            $data = $this->bantuan->rajaongkir($this->url."city?province=".$id_province,$this->apiKey,method:"GET");
            return $this->response->setJSON($data);
        }
    }

    public function getCost()
    {
        if ($this->request->isAJAX()){
            $origin = $this->request->getGet('origin');
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight');
            $courier = $this->request->getGet('courier');
            $send = [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
            ];
            $data = $this->bantuan->rajaongkir($this->url."cost", $this->apiKey, $send, "POST");
            return $this->response->setJSON($data);
        }
    }

    public function diskon(){
        $diskon = $this->diskon->findAll();

        return view('shop/index',[
            'diskon' => $diskon,
        ]);
    }

}