<?php

namespace App\DataFixtures;

use App\Entity\Preke;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PrekeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $preke = new Preke();
        $preke->setPavadinimas('Samsung A40');
        $preke->setSKU('12345');
        $preke->setStatus('YRA');
        $preke->setbase(150);
        $preke->setspecial(0);
        $preke->setImg('https://images-na.ssl-images-amazon.com/images/I/81TFYmJlBEL._AC_SX466_.jpg');
        $preke->setDesc('Vidinė atmintis (GB)	64Branduoliai	Aštuonių branduolių (Octa)Priekinė fotokamera (MP)	25.04G	YraBarkodas	8801643793906Dvi SIM kortelės	Yra3G	YraBluetooth	YraEkrano įstrižainė (")	5.9Plotis (cm)	6.9000Spalva	MėlynaGylis (cm)	0.7900Galinė fotokamera (MP)	16.0+5.0Ekrano raiška (taškų)	2220x1080Atmintinė (RAM) (GB)	4 GBBevielis ryšys (Wi-Fi)	YraTaktinis dažnis (MHz)	2x2.2 GHz & 6x1.6 GHzBaterijos talpa (mAh)	3100Autofokusavimas	YraIntegruota blykstė	YraAukštis (cm)	14.4300');
        
        $manager->persist($preke);

        $preke1 = new Preke();
        $preke1->setPavadinimas('Samsung S9+');
        $preke1->setSKU('12346');
        $preke1->setStatus('YRA');
        $preke1->setbase(550);
        $preke1->setspecial(480);
        $preke1->setImg('https://images.kainos24.lt/43/70/samsung-galaxy-s9-plus-2.jpg');
        $preke1->setDesc('Galinė fotokamera (MP)	12.0 + 12.0 Naršyklė	Chrome, S Browser Operacinė sistema	Android 8.0 Korpuso medžiagos	Aliuminis Ekrano raiška (taškų)	2960x1440 Atmintinė (RAM) (GB)	6 GB Bevielis ryšys (Wi-Fi)	Yra Taktinis dažnis (MHz)	4x1.95 GHz & 4x2 GHz Ekrano tipas	Super AMOLED');
        
        $manager->persist($preke1);

        $preke2 = new Preke();
        $preke2->setPavadinimas('iPhone 11 pro');
        $preke2->setSKU('12347');
        $preke2->setStatus('YRA');
        $preke2->setbase(950);
        $preke2->setspecial(0);
        $preke2->setImg('https://csmobiles.com/21191-large_default/apple-iphone-11-pro-512gb-grey.jpg');
        $preke2->setDesc('Kameros savybės	12 MP – teleobjektyvas, fotografavimo režimą aptinkantis autofokusas, OIS, 2x optinis priartinimas, F2.0.Matmenys	144 mm x 71.4 mm x 8.1 mmWi-fi	Wi-Fi 802.11 a/b/g/n/ac/axKameros savybės	12 MP – itin plataus matymo kampo objektyvas – F2.4.Svoris (g)	188Apsauga nuo drėgmės ir dulkių	IP68 ( iki 4 m gylyje, iki 30 min.)Dvi SIM kortelės (dual SIM)	Palaiko vieną standartinę SIM kortelę bei dar gali palaikyti vieną eSIM.SIM tipas	NanoOperacinė sistema	iOS 13Meniu lietuvių k.	NeEkrano tipas	Super Retina XDR ( OLED technologijos)Ekrano raiška (pikseliais)	1125 x 2436Ekrano įstrižainė (coliais)	5.8Ekrano apsauga	✔Procesorius	Apple A13 BionicVidinė atmintis	512GB/256GB/64GBAtminties kortelė	✘Integruota baterija	Taip');
        
        $manager->persist($preke2);

        $preke3 = new Preke();
        $preke3->setPavadinimas('iPhone 4s');
        $preke3->setSKU('12348');
        $preke3->setStatus('NERA');
        $preke3->setbase(100);
        $preke3->setspecial(80);
        $preke3->setImg('https://www.online-dxb.com/wp-content/uploads/2018/10/iPhone-4-Black.png');
        $preke3->setDesc('16GB vidine, 1GB ram');
        $manager->persist($preke3);


        $manager->flush();
    }
}
