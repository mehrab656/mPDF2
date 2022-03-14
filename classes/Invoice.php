<?php
/**
 * This Class is used to create some Dummy data for table <br>
 * Rendering. This File is not much important . in table.php file, you'll get data from your own backend.
 */

namespace Classes;

class Invoice {

	public function data(): array {
		$data['invoice_no']     = '#abcd123';
		$data['date']           = date( 'Y-m-d' );
		$data['total']          = 3500;
		$data['sales_status']   = "sales status";
		$data['payment_status'] = "Due";

//		reseller info
		$data['reseller'] = [
			'name'    => 'Alexa Nancio',
			'address' => [
				'street'  => '2894 Rinehart Road',
				'city'    => 'Miami',
				'state'   => 'Florida',
				'phone'   => '+786-434-2718',
				'zip'     => 33128,
				'country' => 'United States'
			],
		];

		for ( $i = 0; $i < 100; $i ++ ) {
			$tariff                = [ 'Monthly', 'Half-Yearly', 'Yearly' ];
			$data['subscribers'][] = [
				'name'  => $this->getname( rand( 0, 49 ) ),
				'plan'  => $tariff[ rand( 0, 2 ) ],
				'price' => rand( 5, 100 )
			];
		}

		$data['note'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet incidunt modi officia quae sint! Dolorem esse eveniet nesciunt obcaecati rem. Architecto eius error incidunt iste, nam omnis quis sit voluptatibus.';

		return $data;
	}


	private function getname( $id ): string {

		$firstName = [
			'Johnathon',
			'Anthony',
			'Erasmo',
			'Raleigh',
			'Nancie',
			'Tama',
			'Camellia',
			'Augustine',
			'Christeen',
			'Luz',
			'Diego',
			'Lyndia',
			'Thomas',
			'Georgianna',
			'Leigha',
			'Alejandro',
			'Marquis',
			'Joan',
			'Stephania',
			'Elroy',
			'Zonia',
			'Buffy',
			'Sharie',
			'Blythe',
			'Gaylene',
			'Elida',
			'Randy',
			'Margarete',
			'Margarett',
			'Dion',
			'Tomi',
			'Arden',
			'Clora',
			'Laine',
			'Becki',
			'Margherita',
			'Bong',
			'Jeanice',
			'Qiana',
			'Lawanda',
			'Rebecka',
			'Maribel',
			'Tami',
			'Yuri',
			'Michele',
			'Rubi',
			'Larisa',
			'Lloyd',
			'Tyisha',
			'Samatha',
		];

		$lastName = [
			'Mischke',
			'Serna',
			'Pingree',
			'Mcnaught',
			'Pepper',
			'Schildgen',
			'Mongold',
			'Wrona',
			'Geddes',
			'Lanz',
			'Fetzer',
			'Schroeder',
			'Block',
			'Mayoral',
			'Fleishman',
			'Roberie',
			'Latson',
			'Lupo',
			'Motsinger',
			'Drews',
			'Coby',
			'Redner',
			'Culton',
			'Howe',
			'Stoval',
			'Michaud',
			'Mote',
			'Menjivar',
			'Wiers',
			'Paris',
			'Grisby',
			'Noren',
			'Damron',
			'Kazmierczak',
			'Haslett',
			'Guillemette',
			'Buresh',
			'Center',
			'Kucera',
			'Catt',
			'Badon',
			'Grumbles',
			'Antes',
			'Byron',
			'Volkman',
			'Klemp',
			'Pekar',
			'Pecora',
			'Schewe',
			'Ramage',
		];

		return $firstName[ $id ] . ' ' . $lastName[ $id ];

	}
}