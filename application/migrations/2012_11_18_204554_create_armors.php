<?php

class Create_Armors {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('desc', 64);
		});

		$cats = array(
			'Aço',
			'Anjos Celestes',
			'Anjos da Morte',
			'Berserkers',
			'Bronze',
			'Coroa do Sol',
			'Elísios',
			'Fantasmas I',
			'Fantasmas II',
			'Gigas',
			'Guerreiros Deuses I',
			'Guerreiros Deuses II',
			'Kamuis',
			'Marinas',
			'Negras',
			'Ouro',
			'Prata',
			'Sapuris',
			'Titãs',
			'Yumekai'
		);

		foreach ($cats as $cat) {
			DB::table('categories')->insert(array(
				'desc' => $cat,
			));
		}

		Schema::create('classes', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('desc', 64);
			$table->integer('cosmo');
			$table->integer('cost');
		});

		$classes = array(
			array('S','99','70000'),
			array('A','54','50000'),
			array('B','37','30000'),
			array('C','15','15000'),
			array('D','2','5000'),
		);

		foreach ($classes as $class) {
			DB::table('classes')->insert(array(
				'desc' => $class[0],
				'cosmo' => $class[1],
				'cost' => $class[2],
			));
		}

		Schema::create('armors', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');

			/* info */
			$table->string('name', 64);
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned()->nullable();
			$table->integer('class_id')->unsigned()->nullable();

			/* attr */
			$table->integer('health');
			$table->integer('health_max');
			$table->integer('in_use')->default(0);

			$table->integer('str');
			$table->integer('res');
			$table->integer('dex');
			$table->integer('vit');

			$table->integer('cosmo');

			$table->text('attacks');
			$table->text('extras');
		});

		$armors = array(
			array('Condor','1','5','200','200','100','33','33','66','10','Furacão de Aço,Absorção','A armadura fora do corpo obtém a forma de uma \'nave\', podendo ser usada para voar.'),
			array('Raposa','1','5','200','200','100','33','33','66','10','Furacão de Aço,Deslocamento de Terra','A armadura fora do corpo obtém a forma de um \'carro\', podendo ser usada como um \'skate\'.'),
			array('Merlin','1','5','200','200','100','33','33','66','10','Furacão de Aço,Anulação de Onda','A armadura fora do corpo obtém a forma de uma \'lancha\', podendo ser usada na água.'),
			array('Enguia','1','5','200','200','100','33','33','66','10','Furacão de Aço,Descarga Elétrica',''),
			array('Pégaso','5','4','350','350','150','50','50','100','15','Meteoro de Pégaso,Cometa de Pégaso,Turbilhão de Pégaso',''),
			array('Dragão','5','4','350','350','150','50','50','100','15','Cólera do Dragão,Chute do Dragão,Dragão Nascente,Último Dragão,Cólera dos 100 Dragões','Escudo do Dragão.'),
			array('Cisne','5','4','350','350','150','50','50','100','15','Pó de Diamante,Círculo de Gelo,Turbilhão de Gelo,Trovão Aurora,Execução Aurora','Escudo do Cisne.'),
			array('Andrômeda','5','4','350','350','150','50','50','100','15','Corrente de Andrômeda,Corrente Nebulosa,Defesa Circular,Onda Relâmpago,Teia de Aranha de Andrômeda,Rede de Andrômeda,Espiral de Andrômeda,Bumerangue de Andrômeda,Armadilha de Andrômeda,Grande Captura de Andrômeda,Tempestade Nebulosa','Corrente de Andrômeda.'),
			array('Fênix','5','4','350','350','150','50','50','100','15','Ave Fênix,Golpe Fantasma,Asas de Fênix',''),
			array('Unicórnio','5','4','350','350','150','50','50','100','15','Chifre de Unicórnio,Galope do Unicórnio',''),
			array('Lobo','5','4','350','350','150','50','50','100','15','Uivo Mortal do Lobo',''),
			array('Forno','5','5','200','200','100','33','33','66','10','Chamas Infernais,Barreira de Fogo,Meteoros de Fogo','Armadura Imune a Fogo.'),
			array('Hidra Macho','5','4','350','350','150','50','50','100','15','Garras Venenosas','Garras Venenosas da Hidra'),
			array('Camaleão','5','5','200','200','100','33','33','66','10','Chicote de Camaleão','Chicote de Camaleão.'),
			array('Kaitos','5','5','200','200','100','33','33','66','10','Corrente Nebulosa Dupla','Corrente de Kaitos.'),
			array('Cassiopéia','5','5','200','200','100','33','33','66','10','Corrente Nebulosa Dupla','Corrente de Cassiopéia.'),
			array('Grou','5','5','200','200','100','33','33','66','10','Bicada do Grou,Pulo do Grou','Punhos em formas de Bicos, altamentes perfurantes.'),
			array('Tucano','5','5','200','200','100','33','33','66','10','Bicada Fatal','Foice de Bronze.'),
			array('Girafa','5','5','200','200','100','33','33','66','10','Esta armadura não possui golpes',''),
			array('Dourado','5','5','200','200','100','33','33','66','10','Corrente Marinha,Água Congelante',''),
			array('Lebre','5','5','200','200','100','33','33','66','10','Ilusão do Coelho,Rajada Psíquica',''),
			array('Cão Menor','5','5','200','200','100','33','33','66','10','Matilha,Flash de Garras',''),
			array('Cavalo','5','5','200','200','100','33','33','66','10','Impulso Equino,Chicote divino','Chicote das Almas.'),
			array('Pomba','5','5','200','200','100','33','33','66','10','Mira Maldita',''),
			array('Urso','5','4','350','350','150','50','50','100','15','Braços de Urso',''),
			array('Leão Menor','5','4','350','350','150','50','50','100','15','Ataque Explosivo do Leão',''),
			array('Hidra Fêmea','5','4','350','350','150','50','50','100','15','Punho de Hércules',''),
			array('Lagarto','17','3','500','500','200','100','100','150','20','Força Demoníaca',''),
			array('Centauro','17','3','500','500','200','100','100','150','20','Chama de Babel',''),
			array('Auriga','17','3','500','500','200','100','100','150','20','Ataque do Disco','Discos de Prata que usam a velocidade girátoria para cortar o que está no caminho. Se arremessados, agem como Bumerangues.'),
			array('Cérbero','17','3','500','500','200','100','100','150','20','Bola de Aço','Correntes com Bolas de Aço.'),
			array('Corvo','17','3','500','500','200','100','100','150','20','Pluma Negra',''),
			array('Perseus','17','3','500','500','200','100','100','150','20','Górgona Demoníaca','Escudo da Medusa. É capaz de transformar em pedra qualquer um que olhar diretamente para ele ou até mesmo quem manter os olhos na direção do escudo, mesmo fechados, já que o poder do escudo atravessa a retina e atinge diretamente o cérebro do oponente.'),
			array('Cães de Caça','17','3','500','500','200','100','100','150','20','Ataque de um Milhão de Fantasmas',''),
			array('Baleia','17','3','500','500','200','100','100','150','20','Força Explosiva de Kaitos',''),
			array('Mosca','17','3','500','500','200','100','100','150','20','Vôo Mortal',''),
			array('Cão Maior','17','3','500','500','200','100','100','150','20','Golpe do Cão Maior',''),
			array('Hércules','17','3','500','500','200','100','100','150','20','Poder Supremo de Hércules',''),
			array('Pavão','17','3','500','500','200','100','100','150','20','Mil Braços',''),
			array('Lótus','17','3','500','500','200','100','100','150','20','Explosão de Lótus',''),
			array('Cobra','17','3','500','500','200','100','100','150','20','Venha Cobra,Garras de Trovão',''),
			array('Águia','17','3','500','500','200','100','100','150','20','Meteoros,Lampejo da Águia,Soco Aéreo',''),
			array('Cefeu','17','3','500','500','200','100','100','150','20','Corrente Lança','Corrente de Prata.'),
			array('Bússola','17','3','500','500','200','100','100','150','20','Agilidade Telecinética,Punho dos Quatro Cantos',''),
			array('Flecha','17','3','500','500','200','100','100','150','20','Flechas Envenenadas,Flecha Suprema',''),
			array('Coroa Boreal','17','3','500','500','200','100','100','150','20','Pó de Diamante,Círculo de Gelo,Trovão Aurora',''),
			array('Tarântula','17','3','500','500','200','100','100','150','20','Teia de Tarântula',''),
			array('Lira','17','3','500','500','200','100','100','150','20','Acorde Noturno,Acorde Perfeito,Serenata da Viagem da Morte','Lira Sagrada.'),
			array('Altar','17','3','500','500','200','100','100','150','20','Esta armadura não possui golpes',''),
			array('Taça','17','3','500','500','200','100','100','150','20','Cura da Taça,Taça das Almas',''),
			array('Escultor','17','3','500','500','200','100','100','150','20','Esta armadura não possui golpes',''),
			array('Heimdall','11','3','500','500','200','100','100','150','20','Escudo de Odin,Punho Divino',''),
			array('Midgard','11','4','350','350','150','50','50','100','15','Pó de Diamante,Círculo de Gelo,Trovão Aurora',''),
			array('Ur','11','4','350','350','150','50','50','100','15','Punho Flamejante,Chamas dos Deuses','Espada de Fogo de Ur.'),
			array('Rung','11','4','350','350','150','50','50','100','15','Martelo Bumerangue,Grande Terremoto','Dois Bumerangues chamados de Martelo Mjolnir (Nome do Martelo do deus Thor).'),
			array('Loki','11','4','350','350','150','50','50','100','15','Ataque de Lobos,Tempestade de Odin',''),
			array('Áries','16','2','750','750','250','150','150','200','25','Telecinese,Rede de Cristal,Teletransporte,Extinção Estrelar,Muralha de Cristal,Revolução Estrelar',''),
			array('Touro','16','2','750','750','250','150','150','200','25','Punho de Aço,Esquiva Ilusória,Posição de Iai,Grande Chifre,SuperNova Titânica',''),
			array('Gêmeos','16','2','750','750','250','150','150','200','25','Aniquilação Sensorial,Outra Dimensão,Explosão Galáctica,Erupção Negra Esmagadora',''),
			array('Câncer','16','2','750','750','250','150','150','200','25','Pinça do Caranguejo,Ondas do Inferno,Chamas Demoníacas Azuis,Hecatombe dos Espíritos,Explosão das Almas',''),
			array('Leão','16','2','750','750','250','150','150','200','25','Presa Relâmpago,Cápsula do Poder,Plasma Relâmpago,Invocação de Fótons,Aceleração de Fótons,Rugido do Leão,Explosão de Fótons',''),
			array('Virgem','16','2','750','750','250','150','150','200','25','Telecinese,Privação de Sentidos,Karn,Bênção do Senhor das Trevas,Invocação dos Espíritos,Rendição Divina,Círculo das Seis Existências,Tesouro do Céu',''),
			array('Libra','16','2','750','750','250','150','150','200','25','Convocação de Armas,Cólera do Dragão,Dragão Nascente,Último Dragão,Cólera dos 100 Dragões','Pares de Espadas de Ouro, de Tridentes de Ouro, de Tonfás (Cacetetes) de Ouro, de Barras Triplas de Ouro, de Barras Duplas (Nunchaku) de Ouro e de Escudos de Ouro. O Escudo possui uma corrente que se enrola nele permitindo que o usuário arremesse-o contra o oponente e o \'receba\' na sua mão após o ataque.'),
			array('Escorpião','16','2','750','750','250','150','150','200','25','Agulha Escarlate,Antares,Restrição,Agulha Incandescente,Antares Incandescente',''),
			array('Sagitário','16','2','750','750','250','150','150','200','25','Flecha de Ouro,Trovão Atômico,Destruição Infinita,Impulso de Luz','Arco e Flechas de ouro.'),
			array('Capricórnio','16','2','750','750','250','150','150','200','25','Excalibur,Pedras Saltitantes,X-Calibur,Dança das Espadas,Espada de Luz',''),
			array('Aquário','16','2','750','750','250','150','150','200','25','Pó de Diamante,Círculo de Gelo,Trovão Aurora,Execução Aurora,Nevasca Congelante',''),
			array('Peixes','16','2','750','750','250','150','150','200','25','Vinha de Rosas,Rosas Diabólicas,Rosas Piranhas,Rosa Sangrenta,Espinhos Carmesim',''),
			array('Mantis','3','3','500','500','200','100','100','150','20','Punho Mágico de Mantis','Garras altamente cortantes e perfurantes.'),
			array('Borboleta','3','3','500','500','200','100','100','150','20','Fantasia de Moa',''),
			array('Belzebu','3','3','500','500','200','100','100','150','20','Asas do Inferno','Asas Flamejantes.'),
			array('Ashtarote','3','3','500','500','200','100','100','150','20','Picada de Cobra','Punho Venenoso.'),
			array('Dimensões','19','2','750','750','250','150','150','200','25','Dunamis Absoluto,Secção Espacial,Hecatônquiro Convocado,Fúria de Hecatônquiro,Cem Tiros,Planeta Negro,Espada das Seis Estrelas,Círculo do Caos,Lâmina do Caos,Transferência do Caos','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de uma Espada de Lâmina Dupla e pode ser usada pelo usuário como arma nas lutas.'),
			array('Relâmpago Negro','19','2','750','750','250','150','150','200','25','Dunamis Absoluto,Rapiera Negra,Rapiera Cintilante,Vendaval Negro,Iluminação Negra,Plasma Negro,Rotação do Trovão Negro','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de uma grande Rapieira (espada cuja lâmina é longa, fina e flexível) e pode ser usada pelo usuário como arma nas lutas. Possui também embutida duas Rapieiras.'),
			array('Galáxia','19','2','750','750','250','150','150','200','25','Dunamis Absoluto,Lâmina Estelar,Correia Estelar,Círculo Estelar,Escudo Estelar,Batida do Escudo,Espada de Oricalco,Shoushiken','Cimitarra: Espécies de "lâmina dupla", onde o cosmo envolve as duas lâminas.'),
			array('Ébano','19','2','750','750','250','150','150','200','25','Dunamis Absoluto,Vórtex Gurthang,Vórtex Negro,Vórtex Solar,Proeminência Solar,Espada Proeminente,Ouroborus Proeminente','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de uma espada, chamada Gurthang, e pode ser usada pelo usuário como arma nas lutas.'),
			array('Febe','19','2','750','750','250','150','150','200','25','Dunamis Absoluto','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de um punhal, e pode ser usada pelo usuário como arma nas lutas.'),
			array('Tempo','19','1','1000','1000','300','200','200','250','30','Dunamis Absoluto,Oráculo Onipotente,Rugido das Trevas,Tempestade do Caos,Domínio de Fenômenos,Areia de Adamantiun','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de uma foice, chamada de Megas Drepanon, e pode ser usada pelo usuário como arma nas lutas.'),
			array('Mnemôsine','19','2','750','750','250','150','150','200','25','Dunamis Absoluto','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de um machado, e pode ser usada pelo usuário como arma nas lutas.'),
			array('Oceano','19','2','750','750','250','150','150','200','25','Dunamis Absoluto,Margem do Córrego,Impacto da Correnteza,Dilúvio de Thalassa,Corrente D\'água Luminescente','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de espadas gêmeas, e pode ser usada pelo usuário como arma nas lutas.'),
			array('Réia','19','2','750','750','250','150','150','200','25','Dunamis Absoluto,Serpente da Terra,Salamandra de Fogo','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de uma katar (Uma adaga, onde a base forma um H em horizontal e a lâmina acima da base é afiada), e pode ser usada pelo usuário como arma nas lutas.'),
			array('Fogo','19','2','750','750','250','150','150','200','25','Dunamis Absoluto','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de uma balista (Uma espécie de arco, na qual são atirados projéteis), e pode ser usada pelo usuário como arma nas lutas.'),
			array('Julgamento','19','2','750','750','250','150','150','200','25','Dunamis Absoluto,Lâmina do Julgamento,Balança do Julgamento','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de uma lança, chamada de Braberus, e pode ser usada pelo usuário como arma nas lutas.'),
			array('Mar','19','2','750','750','250','150','150','200','25','Dunamis Absoluto','Sua Sohma (Armadura dos Titãs) fora do corpo toma a forma de um martelo, e pode ser usada pelo usuário como arma nas lutas.'),
			array('Pégaso Negro','15','5','200','200','100','33','33','66','10','Meteoro Negro',''),
			array('Dragão Negro','15','5','200','200','100','33','33','66','10','Tornado Negro','Escudo do Dragão Negro.'),
			array('Cisne Negro','15','5','200','200','100','33','33','66','10','Tempestade Negra de Gelo,Cristal de Gelo','Escudo do Cisne Negro. Elmo do Cisne Negro, este é capaz de memorizar tudo que o cavaleiro de Cisne Negro quiser, sendo que este pode enviar para onde quiser quando terminar a memorização.'),
			array('Andrômeda Negro','15','5','200','200','100','33','33','66','10','Corrente Negra','Corrente Negra.'),
			array('Fênix Negro','15','5','200','200','100','33','33','66','10','Golpe Fantasma das Trevas,Chamas do Inferno',''),
			array('Harpa','9','4','350','350','150','50','50','100','15','Requiém de Cordas,Suave Melodia','Harpa Fantasma.'),
			array('Sagita','9','4','350','350','150','50','50','100','15','Flechas Fantasmas',''),
			array('Escudo','9','4','350','350','150','50','50','100','15','Escudo Mortal,Escudo Bumerangue','Escudo Protetor.'),
			array('Cruzeiro do Sul','9','4','350','350','150','50','50','100','15','Trovão do Cruzeiro do Sul',''),
			array('Órion','9','4','350','350','150','50','50','100','15','Choque Megatômico de Meteoros,Explosão de Meteoros',''),
			array('Esqueleto','18','5','200','200','100','33','33','66','10','Pequeno Arbusto,Grande Flato',''),
			array('Deep','18','4','350','350','150','50','50','100','15','Perfurme Mortal,Fragrância Profunda',''),
			array('Sapo','18','5','200','200','100','33','33','66','10','Salto Esmagador',''),
			array('Pappilon','18','4','350','350','150','50','50','100','15','Fio de Seda,Investida da Larva,Transformação,Defesa de Seda Resistente,Horrível Erupção,Telecinese,Controle de Borboletas,Encantamento Mortal,Retrocedendo','Asas de Pappilon que dão a possibilidade ao espectro de Pappilon de voar.'),
			array('Harpia','18','4','350','350','150','50','50','100','15','Devorador de Vidas,Doce Chocolate','Asas da sapuris de Harpia, dá ao espectro a possibilidade de voar.'),
			array('Ciclope','18','4','350','350','150','50','50','100','15','Abraço do Gigante,Junta Gigante',''),
			array('Verme','18','4','350','350','150','50','50','100','15','Tentáculos do Verme,Rugido Sangrento','Seis tentáculos resistentes, são capazes de perfurar qualquer coisa e podem se regenerar dependendo do cosmo do espectro.'),
			array('Minotauro','18','4','350','350','150','50','50','100','15','Grandioso Machado Esmagador',''),
			array('Mandrágora','18','4','350','350','150','50','50','100','15','Grito Dilacerante','Uma face no lado direito do peito do espectro, quando comandado pelo espectro, a face começa a gritar emitindo um som, assim como as lendas sobre a mandrágora, os gritos podem imobilizar o oponente.'),
			array('Alraune','18','4','350','350','150','50','50','100','15','Guilhotina da Flor Sangrenta',''),
			array('Basilisco','18','4','350','350','150','50','50','100','15','Vôo do Extermínio','Asas pertencentes à armadura, dá ao espectro a capacidade de planar. Estas asas possuem também a propriedade de veneno capaz de destruir a natureza quando o espectro assim libera as propriedades venenosas.'),
			array('Aqueronte','18','4','350','350','150','50','50','100','15','Remo Giratório,Redemoinho Esmagador','Remo de Aqueronte.'),
			array('Esfinge','18','4','350','350','150','50','50','100','15','Manipulação de Ilusão pela Lira Demoníaca,Balança da Maldição','Lira Demoníaca.'),
			array('Troll','18','5','200','200','100','33','33','66','10','Máxima Perestroika',''),
			array('Balron','18','4','350','350','150','50','50','100','15','Chicote de Fogo,Reencarnação','Chicote de Balron.'),
			array('Golem','18','5','200','200','100','33','33','66','10','Avalanche Explosiva',''),
			array('Lycaon','18','4','350','350','150','50','50','100','15','Uivo Infernal',''),
			array('Durahan','18','5','200','200','100','33','33','66','10','Spray de Sangue,Mensageiro da Morte',''),
			array('Besouro Mortal','18','4','350','350','150','50','50','100','15','Grande Parede,Fique Comigo',''),
			array('Górgona','18','5','200','200','100','33','33','66','10','Olho da Custódia,Cadeado Mortal',''),
			array('Elfo','18','5','200','200','100','33','33','66','10','Contagem Natural,Mistura de Terremoto',''),
			array('Wyvern','18','2','750','750','250','150','150','200','25','Rugido Deslizante,Dimensão dos Mortos,Máxima Precaução','Asas de Wyvern, permite que o espectro a use como impulso para voar. Garras de Wyvern (Não existem)'),
			array('Griffon','18','2','750','750','250','150','150','200','25','Marionete cósmica,Vôo das Plumas Gigantes','Asas de Grifo, permite ao espectro a capacidade de planar e também esta possui uma grande resistência a golpes físicos.'),
			array('Garuda','18','2','750','750','250','150','150','200','25','Ilusão Galáctica,Vôo da Garuda,Conquistador de Indra,Resplendor da Morte Galáctica','Asas de Garuda, permite ao espectro voar por todo o local, usando suas asas para liberar uma forte ventania para repelir armas do oponente.'),
			array('Auriga de Sapuris','18','3','500','500','200','100','100','150','20','Ataque do Disco','Discos de Sapuris que usam a velocidade girátoria para cortar o que está no caminho. Se arremessados, agem como Bumerangues.'),
			array('Cérbero de Sapuris','18','3','500','500','200','100','100','150','20','Bola de Aço','Correntes com Bolas de Aço.'),
			array('Perseus de Sapuris','18','3','500','500','200','100','100','150','20','Górgona Demoníaca','Escudo da Medusa. É capaz de transformar em pedra qualquer um que olhar diretamente para ele ou até mesmo quem manter os olhos na direção do escudo, mesmo fechados, já que o poder do escudo atravessa a retina e atinge diretamente o cérebro do oponente.'),
			array('Hércules de Sapuris','18','3','500','500','200','100','100','150','20','Poder Supremo de Hércules',''),
			array('Mosca de Sapuris','18','3','500','500','200','100','100','150','20','Vôo Mortal',''),
			array('Cão Maior de Sapuris','18','3','500','500','200','100','100','150','20','Golpe do Cão Maior',''),
			array('Lagarto de Sapuris','18','3','500','500','200','100','100','150','20','Força Demoníaca',''),
			array('Centauro de Sapuris','18','3','500','500','200','100','100','150','20','Chama de Babel',''),
			array('Baleia de Sapuris','18','3','500','500','200','100','100','150','20','Força Explosiva de Kaitos',''),
			array('Áries de Sapuris','18','2','750','750','250','150','150','200','25','Telecinese,Teletransporte,Extinção Estelar,Muralha de Cristal,Telepatia de Áries,Revolução Estelar',''),
			array('Câncer de Sapuris','18','2','750','750','250','150','150','200','25','Ondas do Inferno,Telepatia',''),
			array('Peixes de Sapuris','18','2','750','750','250','150','150','200','25','Rosas Diabólicas Reais,Rosas Piranhas,Rosa Sangrenta,Telepatia',''),
			array('Aquário de Sapuris','18','2','750','750','250','150','150','200','25','Pó de Diamante,Círculo de Gelo,Trovão Aurora,Esquife de Gelo,Execução Aurora,Telepatia',''),
			array('Capricórnio de Sapuris','18','2','750','750','250','150','150','200','25','Excalibur,Pedras Saltitantes,Telepatia',''),
			array('Gêmeos de Sapuris','18','2','750','750','250','150','150','200','25','Aniquilação Sensorial,Outra Dimensão,Satã Imperial,Criar Ilusões,Explosão Galáctica,Telepatia',''),
			array('Serpente','8','5','200','200','100','33','33','66','10','Golpe da Serpente','Diferente das demais armaduras, a armadura de Serpente é colada no corpo e bastante escorregadia o que dificulta muito um ataque físico do oponente.'),
			array('Golfinho','8','5','200','200','100','33','33','66','10','Golpe de Golfinho,Cabeçada do Golfinho','Diferente das demais armaduras, a armadura de Golfinho é colada no corpo e bastante escorregadia o que dificulta muito um ataque físico do oponente.'),
			array('Medusa','8','5','200','200','100','33','33','66','10','Força dos Torpedos,Tentáculos','Diferente das demais armaduras, a armadura de Medusa é colada no corpo e bastante escorregadia o que dificulta muito um ataque físico do oponente.'),
			array('Vampiro','8','5','200','200','100','33','33','66','10','Força do Espectro,Garras do Inferno','Garras altamente cortantes e perfurantes.'),
			array('Dubhe','12','2','750','750','250','150','150','200','25','Espada de Odin,Vendaval do Dragão',''),
			array('Phecda','12','2','750','750','250','150','150','200','25','Machados de Thor,Machados Mágicos,Hércules Titânico','Machados Mágicos de Phecda. Eles se arremessados, agem como Bumerangues.'),
			array('Alioth','12','2','750','750','250','150','150','200','25','Alcateia de Lobos,Garra Assassina,Golpe do Lobo Imortal','Garras de Lobo Retráveis, Máscara do Lobo de Asgard.'),
			array('Merak','12','2','750','750','250','150','150','200','25','Força Congelante,Raio de Fogo',''),
			array('Benetnasch','12','2','750','750','250','150','150','200','25','Acorde Demoníaco,Acorde Perfeito','Harpa dos Deuses.'),
			array('Megrez','12','2','750','750','250','150','150','200','25','Espada de Fogo,Couraça Ametista,Unidade da Natureza','Espada de Fogo.'),
			array('Mizar','12','2','750','750','250','150','150','200','25','Garras do Tigre Negro,Impulso Azul',''),
			array('Arkor','12','2','750','750','250','150','150','200','25','Garras do Tigre da Sombra,Punho do Tigre da Sombra',''),
			array('Cavalo Marinho','14','2','750','750','250','150','150','200','25','Ventos de Tempestade,Sopro Divino',''),
			array('Sirene','14','2','750','750','250','150','150','200','25','Sinfonia Final da Morte,Climax Final da Morte','Flauta Doce de Sirene'),
			array('Chrysaor','14','2','750','750','250','150','150','200','25','Lança Relâmpago,Maha Roshini','Tridente de Oriucalcum. É capaz de produzir rajadas de ar altamente cortantes a grandes distâncias, somente com golpes do tridente no ar.'),
			array('Scylla','14','2','750','750','250','150','150','200','25','Tornado Violento,Ferrão da Abelha Rainha,Águia Poderosa,Serpente Assassina,Fúria do Lobo,Ataque Vampiro,Urso Infernal',''),
			array('Lymnades','14','2','750','750','250','150','150','200','25','Salamandra Satânica','A armadura de Lymnades dá ao seu usuário a capacidade de penetrar na mente do oponente e se transformar na pessoa que quiser e até imitar seu golpe, porém a força desse golpe não alcança nem 01% da força do original.'),
			array('Kraken','14','2','750','750','250','150','150','200','25','Aurora Boreal',''),
			array('Dragão Marinho','14','2','750','750','250','150','150','200','25','Triângulo Dourado',''),
			array('Sereia','14','2','750','750','250','150','150','200','25','Cilada de Coral',''),
			array('Susako','4','3','500','500','200','100','100','150','20','Explosão Final,Submissão',''),
			array('Seiryu','4','3','500','500','200','100','100','150','20','Tentáculos Mortais,Medo Assassino',''),
			array('Genbu','4','3','500','500','200','100','100','150','20','Terror Supremo,Demônio Fatal',''),
			array('Biakko','4','3','500','500','200','100','100','150','20','Tigre Branco,Fogo Infernal',''),
			array('Abelha','4','5','200','200','100','33','33','66','10','Última Picada',''),
			array('Galo','4','4','350','350','150','50','50','100','15','Asas da Destruição',''),
			array('Coruja','4','5','200','200','100','33','33','66','10','Vôo Noturno',''),
			array('Tartarigame','4','5','200','200','100','33','33','66','10','Poder Terrestre,Tempestade da Tartaruga',''),
			array('Morcego','18','4','350','350','150','50','50','100','15','Sonar do Pesadelo','O espectro assim que entra na arena, convoca, através de ondas supersônicas, morcegos de todos os lugares.'),
			array('Planta Carnívora','4','4','350','350','150','50','50','100','15','Planta Devoradora de Almas',''),
			array('Piranha','4','5','200','200','100','33','33','66','10','Mandíbulas Arrasadoras',''),
			array('Viúva Negra','4','5','200','200','100','33','33','66','10','Teia Venenosa',''),
			array('Javali','4','4','350','350','150','50','50','100','15','Javali Furioso',''),
			array('Búfalo','4','5','200','200','100','33','33','66','10','Chifre de Búfalo',''),
			array('Hiena','4','5','200','200','100','33','33','66','10','Risada Maléfica,Mordida da Hiena',''),
			array('Elefante','4','5','200','200','100','33','33','66','10','Tromba Brutal',''),
			array('Rinoceronte','4','4','350','350','150','50','50','100','15','Chifrada,Fúria do Rinoceronte,Chifre Perfurador',''),
			array('Varan','4','5','200','200','100','33','33','66','10','Soco Relâmpago',''),
			array('Pantera','4','5','200','200','100','33','33','66','10','Rugido da Pantera,Mordida Fatal',''),
			array('Tigre','4','4','350','350','150','50','50','100','15','Grande Furacão do Tigre',''),
			array('Jaguar','4','4','350','350','150','50','50','100','15','garras do Trovão,Fúria do Vento,Garras Supremas','Possui garras afiadíssimas em seus punhos.'),
			array('Gato','4','4','350','350','150','50','50','100','15','Ondas Mentais',''),
			array('Equidna','4','3','500','500','200','100','100','150','20','Ataque Predador',''),
			array('Lince','6','3','500','500','200','100','100','150','20','Hércules Reluzente','Armadura imune ao Fogo.'),
			array('Carina','6','3','500','500','200','100','100','150','20','Coroa de Fogo','Armadura imune ao Fogo.'),
			array('Coma Berenices','6','3','500','500','200','100','100','150','20','Cabelo Dourado da Morte','Armadura imune ao Fogo.'),
			array('Ikarus','2','2','750','750','250','150','150','200','25','Esta armadura não possui golpes',''),
			array('Theseus','2','2','750','750','250','150','150','200','25','Esta armadura não possui golpes',''),
			array('Odysseus','2','2','750','750','250','150','150','200','25','Esta armadura não possui golpes',''),
			array('Atena','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Poseidon','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Hera','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Zeus','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Artemis','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Hades','7','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Lúcifer','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Ares','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Odin','11','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Hermes','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Dionísio','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Abel','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Afrodite','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Apollo','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Polares','11','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Éris','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Hefesto','13','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Hypnos','7','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Thanatos','7','1','1000','1000','300','200','200','250','30','Esta armadura não possui golpes',''),
			array('Poinx','10','3','500','500','200','100','100','150','20','Esta armadura não possui golpes',''),
			array('Cianos','10','3','500','500','200','100','100','150','20','Chicote de Unhas de Fogo,Pedras em Fusão',''),
			array('Leucotes','10','3','500','500','200','100','100','150','20','Esta armadura não possui golpes',''),
			array('Melas','10','3','500','500','200','100','100','150','20','Esta armadura não possui golpes',''),
			array('Paios','10','3','500','500','200','100','100','150','20','Formação de Combate de Oito Garras','Possui duas lâminas acima das luvas da armadura.'),
			array('Anthrakma','10','3','500','500','200','100','100','150','20','Esta armadura não possui golpes','Possui uma maça gigante.'),
			array('Nasu','18','3','500','500','200','100','100','150','20','Ilusões de Espectro,Controle das Moscas,Chamado dos Zumbis,Sepulcro dos Amaldiçoados,Regeneração do Corpo e Alma',''),
			array('Behemoth','18','3','500','500','200','100','100','150','20','Esconderijo das Sombras,Realidade Brutal,Selo das Sombras',''),
			array('Benu','18','2','750','750','250','150','150','200','25','Explosão da Coroa Solar,Impacto da Coroa Solar,Coroa do Sol Negra,Escudo da Coroa Solar,Crucificação Ankh,Elevação das Trevas','Asas que dão à possibilidade do espectro voar por todo o local desejado. Também envolvida por cosmo pode liberar uma rajada de vento contra o oponente.'),
			array('Hanuman','18','2','750','750','250','150','150','200','25','Telecinese,Controle das Almas,Teletransporte,Desejo das Almas do Submundo,Telepatia de Hanuman,Materialização do Desejo das Almas do Submundo','A sapuris de Hanuman dá ao espectro a capacidade de planar sem nem mesmo precisar de asas.'),
			array('Mefisóteles','18','2','750','750','250','150','150','200','25','Domínio Temporal,Outro Mundo,Rebobinar Biológico','Relógio de bolso prateado, para utilizá-lo é necessário que se abra a "tampa".'),
			array('Dryads','18','5','200','200','100','33','33','66','10','Vale dos Lírios,Cura dos Lírios',''),
			array('Phantasos','20','4','350','350','150','50','50','100','15','Em Sono',''),
			array('Icelos','20','2','750','750','250','150','150','200','25','Fenda Dimensional,Em Sono,Devolução Dimensional','Garra de Ikelus, capaz de abrir fendas dimensionais quando usadas pelo espectro.'),
			array('Oneiros','20','2','750','750','250','150','150','200','25','Oráculo do Guardião,Em Sono,Fusão dos Sonhos',''),
			array('Morpheus','20','2','750','750','250','150','150','200','25','Em Sono,Mundo de Morphia,Sonho Real,Papoulas do Mundo dos Sonhos',''),
			array('Sylph','18','4','350','350','150','50','50','100','15','Ventos do Norte',''),
		);

		// name, category_id, class_id, health, health_max, str, dex, res, vit, cosmo, golpes, extras

		foreach ($armors as $armor) {
			DB::table('armors')->insert(array(
				'name' => $armor[0],
				'category_id' => $armor[1],
				'class_id' => $armor[2],
				'health' => $armor[3],
				'health_max' => $armor[4],
				'str' => $armor[5],
				'dex' => $armor[6],
				'res' => $armor[7],
				'vit' => $armor[8],
				'cosmo' => $armor[9],
				'attacks' => $armor[10],
				'extras' => $armor[11],
			));
		}
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('armors');
		Schema::drop('categories');
		Schema::drop('classes');
	}

}