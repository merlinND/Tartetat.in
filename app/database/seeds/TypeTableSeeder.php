<?php
class TypeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('types')->delete();

		Type::create(array(
			'category' => 'tourism',
			'value'    => 'museum',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 2 * 60 * 60,
				'maximum' => 4 * 60 * 60
				))->id
			));

		Type::create(array(
			'category' => 'tourism',
			'value'    => 'artwork',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 15 * 60,
				'maximum' => 60 * 60
				))->id
			));

		Type::create(array(
			'category' => 'tourism',
			'value'    => 'viewpoint',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 15 * 60,
				'maximum' => 60 * 60
				))->id
			));

		Type::create(array(
			'category' => 'tourism',
			'value'    => 'theme_park',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 0,
				'maximum' => 60 * 60
				))->id
			));

		Type::create(array(
			'category' => 'leisure',
			'value'    => 'park',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 4 * 60 * 60,
				'maximum' => 8 * 60 * 60
				))->id
			));

		Type::create(array(
			'category' => 'opendata',
			'value'    => 'ExportOpenData',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 2 * 60 * 60,
				'maximum' => 4 * 60 * 60
				))->id
			));

		Type::create(array(
			'category' => 'opendata',
			'value'    => 'lieuxdediffusion',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 2 * 60 * 60,
				'maximum' => 4 * 60 * 60
				))->id
			));

		Type::create(array(
			'category' => 'opendata',
			'value'    => 'ENSpoint',
			'idTime'   => Time::firstOrCreate(array(
				'minimum' => 2 * 60 * 60,
				'maximum' => 4 * 60 * 60
				))->id
			));
	}

}