<?php

use Illuminate\Database\Seeder;

class QuestionnaireDespminasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionnaireId = DB::table('questionnaires')->insertGetId([
            'name'                  => 'Prova do Curso DESPMINAS',
            'is_active'             => true,
            'answer_once'           => false,
            'parent_id'             => 1,
            'parent_type'           => config('quiz.models.parent_type'),
            'waiting_time'          => 30,
            'type_waiting_time'     => config('quiz.type_time.DAYS.id'),
            'execution_time'        => 60,
            'type_execution_time'   => config('quiz.type_time.MINUTES.id'),
            'rand_questions'        => 1
        ]);
        
        // Question 1
        $questionId = $this->addQuestion($questionnaireId, 'Dentre as afirmativas abaixo, assinale a alternativa CORRETA:');
        
        $this->addAlternative($questionId, true, 'A atividade de Despachante Documentalista, a qual compreende a espécie de Despachante de Veículos, não é uma profissão regulamentada em nosso País.');
        $this->addAlternative($questionId, false, 'Ainda não existe nenhum projeto de lei tramitando no Senado Federal com o objetivo de regulamentar o exercício da profissão de Despachante Documentalista.');
        $this->addAlternative($questionId, false, 'Os Despachantes Documentalistas atuam, predominantemente, junto aos órgãos de trânsito e órgãos municipais de controle de tráfego e por isso são chamados como Despachantes de Veículos.');
        $this->addAlternative($questionId, false, 'O exercício da ocupação de Despachante Documentalista, na prática, requer formação de nível superior e credenciamento junto a órgãos estaduais, nas unidades da federação onde haja legislação específica para o exercício da função.');
        
        // Question 2
        $questionId = $this->addQuestion($questionnaireId, 'Os Despachantes Documentalistas não necessitam de empresa, já que podem trabalhar como Profissionais Autônomos e devem se cadastrar como tais na Prefeitura Municipal, obter o Alvará de Localização e Funcionamento e recolher o ISSQN - Imposto Sobre Serviços de Qualquer Natureza. Não recebem salário específico, trabalham por conta própria e ganham na medida que prestarem seus serviços a terceiros. Essa afirmativa é:');
        $this->addAlternative($questionId, true, 'Falsa');
        $this->addAlternative($questionId, false, 'Verdadeira');
        
        // Question 3
        $questionId = $this->addQuestion($questionnaireId, 'Dentre as atividades de Despachante Documentalista mencionadas abaixo, qual NÃO está relacionada entre as estabelecidas pelo Estado de Minas Gerais através do artigo 2º da Lei Estadual nº 18.037/2009:');        
        $this->addAlternative($questionId, true, 'Revalidação de segunda via da Carteira Nacional de Habilitação - CNH.');
        $this->addAlternative($questionId, false, 'Obtenção do Alvará de Localização e Funcionamento de Despachante de Documentalista.');
        $this->addAlternative($questionId, false, 'Obtenção de atestados de qualquer natureza, documentos e certidões em órgãos públicos estaduais.');
        $this->addAlternative($questionId, false, 'Trâmite de documentos de veículos automotores, impostos sobre a propriedade desses veículos, taxas, multas e emolumentos incidentes sobre serviço de trânsito e transporte.');
        
        
        // Question 4
        $questionId = $this->addQuestion($questionnaireId, 'Para se tornar Despachante Documentalista perante o Estado de Minas Gerais é necessário:');
        $this->addAlternative($questionId, true, 'Associar-se exclusivamente à DESPMINAS - Associação dos Despachantes Documentalistas do Sul de Minas Gerais.');
	    $this->addAlternative($questionId, false, 'Fazer a inscrição no Conselho Regional de Despachantes Documentalistas - CRDD/MG, após a realização de curso profissionalizante de Despachante ou comprovação de atuação na área.');
        $this->addAlternative($questionId, false, 'Praticar, além das atividades de Despachante Documentalista, atos privativos de outras profissões liberais definidas em lei, como advogado, contador, corretor de imóveis, etc.');
	    $this->addAlternative($questionId, false, 'Associar-se à uma Entidade Representativa cadastrada na forma da lei, sendo que o DETRAN/MG disponibiliza sistema informatizado para utilização dessas entidades representativas cadastradas, que devem enviar por meio eletrônico todas as informações relativas aos seus associados.');

        
        // Question 5
        $questionId = $this->addQuestion($questionnaireId, 'O Despachante de Veículos poderá nomear, sob sua responsabilidade, preposto de sua livre escolha. Prepostos são pessoas com vínculo empregatício ou não que agem em nome de uma pessoa, empresa ou organização. Devem ter conhecimento dos atos e fatos da atividade do Despachante e podem fazer tudo o que o Despachante autorizar, mediante requerimento a ser encaminhado a Delegacia de Trânsito / CIRETRAN. Contudo, o Despachante será responsável por todos os atos e procedimentos realizados por seus prepostos, respondendo administrativa, cível e penalmente por suas ações, independentemente de como se deu o fato e se tem conhecimento prévio dele ou não. Essa afirmativa é:');
        $this->addAlternative($questionId, true, 'Verdadeira');
        $this->addAlternative($questionId, false, 'Falsa');
        
        // Question 6
        $questionId = $this->addQuestion($questionnaireId, 'É possível realizar os diversos serviços de Despachante de Veículos sem antes realizar o pagamento de eventuais débitos, tais como multas, IPVA, Seguro DPVAT, Taxa de Licenciamento, dentre outros?');
        $this->addAlternative($questionId, true, 'Sim');
        $this->addAlternative($questionId, false, 'Não');
        
        // Question 7
        $questionId = $this->addQuestion($questionnaireId, 'Dentre as afirmativas abaixo, assinale a FALSA:');        
        $this->addAlternative($questionId, true, 'O Imposto sobre a Propriedade de Veículos Automotores (IPVA) é um imposto que incide sobre a propriedade de veículos e somente os Estados e o Distrito Federal têm competência para instituí-lo.');
	    $this->addAlternative($questionId, false, 'O Danos Pessoais causados por Veículos Automotores de via Terrestre (DPVAT) tem a finalidade de amparar as vítimas de acidentes de trânsito em todo o território nacional brasileiro, não importando de quem seja a culpa dos acidentes.');
	    $this->addAlternative($questionId, false, 'O Certificado de Registro e Licenciamento de Veículo (CRLV) é obtido quando o proprietário do veículo faz o Licenciamento Anual de Veículos do carro. Ele deve ser renovado anualmente, sendo de porte obrigatório e é enviado pelos Correios para a casa do motorista.');
	    $this->addAlternative($questionId, false, 'O Certificado de Registro de Veículo (CRV) é um documento utilizado para efetuar a venda de um veículo. O CRV/DUT deve ficar em poder do Despachante Documentalista para ser entregue ao comprador no ato da venda.');
        
        // Question 8
        $questionId = $this->addQuestion($questionnaireId, 'O Despachante Documentalista pode executar os seguintes serviços: a) 2ª Via de CRLV - Certificado de Registro de Licenciamento de Veículo (Licenciamento); b) 2ª Via de CRV - Certificado de Registro de Veículo (Recibo); c) Licenciamento de Veículos dentro do Estado de Minas Gerais e de outros Estados; d) Alteração de Dados de Veículos de Minas Gerais; e) Laudo de Vistoria Lacrada; f) Primeiro Emplacamento; g) Confecção de placas; h) Transferência de Veículos no Estado de Minas Gerais; i) Transferência de Veículos de outros Estados para Minas Gerais; j) Baixa de veículos; l) Baixa de Impedimento Administrativo; m) Troca de Tarjetas e Placas; n) Foto Digital do Motor do Veículo; o) Mudança de Placa (antiga Amarela para atual); p) Transferência de prontuário da CNH de outros Estados. Assinale a alternativa CORRETA:');
        $this->addAlternative($questionId, true, 'Todas as afirmativas são verdadeiras, exceto as letras "c" e "g".');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto a letra "g".');
        $this->addAlternative($questionId, false, 'As letras "o" e "c" são falsas.');
        $this->addAlternative($questionId, false, 'Todas as alternativas são verdadeiras.');
        
        // Question 9
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente as seguintes afirmações: a) Por se tratar de uma profissão que não é regulamentada, não existe uma tabela obrigatória mínima para a cobrança de honorários pelos serviços prestados. b) Os Despachantes são os profissionais responsáveis por intermediar as relações entre as pessoas físicas e jurídicas junto aos órgãos públicos. c) O Departamento de Trânsito de Minas Gerais (DETRAN/MG) é o Órgão Executivo do Sistema Nacional de Trânsito em Minas Gerais, sendo subordinado à Polícia Civil do Estado. d) O Departamento de Trânsito de Minas Gerais (DETRAN/MG) - Órgão Executivo do Sistema Nacional de Trânsito, em Minas Gerais, subordinado à Polícia Civil, está localizado na cidade de Belo Horizonte/MG. e) O Departamento de Trânsito de Minas Gerais (DETRAN/MG) possui 304 Circunscrições Regionais de Trânsito que são as chamadas CIRETRANS, sendo 853 Delegacias de Trânsito da Polícia Civil de Minas Gerais.');
        $this->addAlternative($questionId, true, 'Todas as afirmativas são verdadeiras, exceto a letra "e".');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras.');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são falsas.');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto as letras "f" e "e".');
        
        // Question 10
        $questionId = $this->addQuestion($questionnaireId, 'Em relação a isenção de tributos, o Departamento de Trânsito de Minas Gerais (DETRAN/MG) é responsável somente pelo processo de registro do veículo, sendo certo que o desconto ou isenção de IPI, ICMS e IPVA é de competência exclusiva das Receitas Federal e Estadual. A afirmativa é:');
        $this->addAlternative($questionId, true, 'Falsa');
        $this->addAlternative($questionId, false, 'Verdadeira');
        
        // Question 11
        $questionId = $this->addQuestion($questionnaireId, 'Assinale a alternativa ERRADA:');        
        $this->addAlternative($questionId, true, 'Para o 1º emplacamento do veículo automotor sem alteração de característica, anexar a Ficha Cadastral disponível no site do DETRAN/MG, o decalque do chassi do veículo e se dirigir ao setor de emissão de documento da unidade de trânsito (Capital Divisão de Registro de Veículos (DRV) e Interior Circunscrições Regionais de Trânsito (CIRETRANs).');
        $this->addAlternative($questionId, false, 'Para realizar o registro inicial ou primeiro emplacamento de veículo nacional ou importado não é necessário levar o veículo para vistoria.');
        $this->addAlternative($questionId, false, 'Se o veículo zero quilômetro não for adquirido no município ou Estado onde será emplacado, o proprietário poderá se deslocar até o local onde o emplacamento será realizado em até 30 (trinta) dias após a data de saída constante na nota fiscal.');
        $this->addAlternative($questionId, false, 'O veículo destinado a circulação como táxi, transporte escolar, e aqueles que sofreram alteração das características originais de fábrica deverão proceder a vistoria na unidade de trânsito (Capital Divisão de Registro de Veículos (DRV) e Interior Circunscrições Regionais de Trânsito (CIRETRANs).');
        
        // Question 12
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente as seguintes afirmações: a) A Certidão Negativa de Propriedade de Veículo Automotor é um documento informativo que comprova a inexistência de veículo registrado em Minas Gerais em nome de uma determinada pessoa física; b) A Certidão Positiva de Propriedade de Veículo Automotor é um documento informativo que comprova a existência de veículo(s) registrado(s) em todo o país em nome de uma determinada pessoa física ou jurídica. c) A certidão para ações judiciais (positiva e negativa) de veículos automotor é um documento informativo que apresenta a existência de veículos ou não para um determinado CPF / CNPJ. d) O veículo furtado ou roubado precisa ter um boletim de ocorrência com pedido de impedimento no sistema do DETRAN/MG. e) Em relação a vistoria de veículos, o vistoriador confere a numeração de chassi, motor, carroceria e outros, avalia itens externos e visíveis e aplica multa se verificar a irregularidade do documento do veículo. f) De acordo com o Código de Trânsito Brasileiro, nenhum proprietário ou responsável poderá, sem prévia autorização do órgão de trânsito, fazer ou ordenar que sejam feitas no veículo modificações de suas características de fábrica. Assinale a alternativa CORRETA:');        
        $this->addAlternative($questionId, true, 'Todas as afirmativas são falsas.');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras.');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto a letra "e".');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto as letras "d" e "f".');
        
        // Question 13
        $questionId = $this->addQuestion($questionnaireId, 'Em relação a Selagem de Placa, assinale a alternativa CORRETA:');
        $this->addAlternative($questionId, true, 'Se a placa estiver danificada ou fora dos padrões exigidos, a autoridade de trânsito emitirá uma autorização para que o proprietário do veículo possa comprar novas placas, desde que apresente um Boletim de Ocorrência.');
        $this->addAlternative($questionId, false, 'O valor para Nova selagem de placa é de R$ 355,37.');
        $this->addAlternative($questionId, false, 'Apenas para fins de nova selagem de placa, os débitos poderão ser quitados e atualizados no sistema do Departamento de Trânsito De Minas Gerais (DETRAN-MG) (Imposto Sobre a Propriedade de Veículos Automotores (IPVA), Taxa de Licenciamento, Seguro, Multas e a baixa de impedimentos se houver) após a confecção da nova placa.');
        $this->addAlternative($questionId, false, 'A selagem de placa deverá ser efetuada quando houver rompimento, furto ou danificação do lacre da placa traseira do veículo. Este procedimento é feito somente no município em que o veículo estiver emplacado e registrado.');
        
        // Question 14
        $questionId = $this->addQuestion($questionnaireId, 'O cidadão que se envolver em qualquer tipo de ocorrência de trânsito, de furto e roubo de veículos, suspeição de clonagem ou extravio de documentos (Carteira Nacional de Habilitação (CNH), Certificado de Registro de Veículos (CRV) ou Certificado de Registro e Licenciamento de veículos (CRLV)) deverá se dirigir a uma das Delegacias de Trânsito (no Estado) para procedimento de:');
        $this->addAlternative($questionId, true, 'Registro de Eventos da Defesa Social (REDS).');
        $this->addAlternative($questionId, false, 'Nenhuma das alternativas.');
        $this->addAlternative($questionId, false, 'Registro de Eventos da Defesa Pública (REDP).');
        $this->addAlternative($questionId, false, 'Registro de Eventos Adversos (REA).');
        
        // Question 15
        $questionId = $this->addQuestion($questionnaireId, 'Documento administrativo de liberação do veículo em casos específicos. É um documento administrativo de uso das Delegacias de Trânsito para informação, orientação e a liberação do veículo apreendido. A Delegacia de Trânsito é a responsável pela emissão deste documento, quando o veículo encontra-se em condições (irregulares) que precisam ser avaliadas pelo órgão competente. Esse documento se refere ao:');
        $this->addAlternative($questionId, true, 'Alvará de apreensão.');
        $this->addAlternative($questionId, false, 'Alvará de permissão.');
        $this->addAlternative($questionId, false, 'Alvará de liberação.');
        $this->addAlternative($questionId, false, 'Alvará de funcionamento.');
        
        // Question 16
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente as afirmativas: a) O veículo apreendido no âmbito de competência do Departamento de Trânsito de Minas Gerais (DETRAN-MG), pelas polícias Civil e Militar são levados para pátios de recolhimento terceirizados, até que o proprietário providencie sua liberação. b) O proprietário do veículo apreendido é notificado pela Delegacia de Trânsito, via SMS, sobre a permanência do veículo no pátio de apreensão. O telefone de comunicação é aquele cadastrado no Sistema do DETRAN/MG sobre o bem. c) Para verificar se o veículo está em um pátio do Departamento de Trânsito de Minas Gerais (DETRAN-MG), é necessário pagar uma taxa pelo serviço de verificação e apresentar os documentos do veículo ao DETRAN/MG. d) Veículos que foram recuperados após furto ou roubo e sofreram modificações em qualquer um de seus sinais identificadores, como chassi e motor, devem passar pelo processo de legalização do Certificado de Registro de Veículo (CRV), desde que o furto ou roubo ocorreu há menos de 60 dias. e) O certificado de Registro de Licenciamento de Veículo (CRLV) de veículos furtados ou roubados não passa a ser considerado de porte obrigatório, devido a possibilidade de perda do documento. Assinale a alternativa CORRETA:');
        $this->addAlternative($questionId, true, 'Todas as afirmativas são falsas.');
	    $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras.');
        $this->addAlternative($questionId, false, '	    Todas as afirmativas são falsas, exceto a letra "a".');
	    $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto a letra "e".');
        
        // Question 17
        $questionId = $this->addQuestion($questionnaireId, 'Em relação a alteração de endereço para outro município em MG: O condutor que desejar realizar alteração de endereço de um município para outro, dentro de Minas Gerais, poderá alterar o endereço de correspondência preenchendo o formulário eletrônico disponível no site do DETRAN/MG. O endereço de correspondência será utilizado para envio do CRLV, notificações atribuídas ao veículo e as demais correspondências, relativas ao veículo, que o DETRAN-MG envia aos Proprietários/Arrendatários. O endereço de correspondência só poderá ser informado/alterado para endereços que sejam do mesmo município de emplacamento do veículo. O veículo deverá passar por vistoria. Para trocar o endereço de um município para outro município em Minas Gerais do veículo automotor, todos os débitos deverão estar quitados e atualizados no sistema do DETRAN/MG (IPVA, Taxa de Licenciamento, Seguro, Multas e a baixa de impedimentos se houver). A afirmativa acima é:');
        $this->addAlternative($questionId, true, 'Verdadeira');
        $this->addAlternative($questionId, false, 'Falsa');
        
        // Question 18
        $questionId = $this->addQuestion($questionnaireId, 'Em relação a baixa de veículo, assinale a alternativa ERRADA:');
        $this->addAlternative($questionId, true, 'O veículo que sair de circulação por ser irrecuperável após um acidente, sinistrado com laudo de perda total, vendido ou leiloado como sucata ou completamente desmontado, é preciso dar baixa no seu registro no sistemas de dados do Departamento de Trânsito de Minas Gerais (DETRAN/MG).');
        $this->addAlternative($questionId, false, 'Deverá ser apresentado o boletim de ocorrência policial ou declaração do proprietário com firma reconhecida em cartório, informando e solicitando o motivo da baixa do veículo.');
        $this->addAlternative($questionId, false, 'O proprietário tem até 45 dias para efetuar a baixa, após a constatação de sua condição através de laudo de vistoria. Para ser expedida a Certidão de Baixa Definitiva.');
        $this->addAlternative($questionId, false, 'Para fins de baixa definitiva do veículo automotor todos os débitos deverão estar quitados e atualizados no sistema do DETRAN/MG (Imposto Sobre a Propriedade de Veículos Automotores (IPVA), Taxa de Licenciamento, Seguro, Multas e a baixa de impedimentos se houver).');
        
        // Question 19
        $questionId = $this->addQuestion($questionnaireId, 'Assinale a alternativa ERRADA:');
        $this->addAlternative($questionId, true, 'Na compra de um veículo usado, é preciso fazer a transferência de propriedade do proprietário anterior para o adquirente.');
	    $this->addAlternative($questionId, false, 'Se o veículo for alienado, deverá constar no sistema do Departamento de Trânsito de Minas Gerais (DETRAN/MG) a alienação cadastrada pelo agente financeiro via Sistema Nacional de Gravames (SNG).');
	    $this->addAlternative($questionId, false, 'Para realizar o processo de transferência não é necessário, em alguns municípios, levar o veículo para vistoria.');
	    $this->addAlternative($questionId, false, 'Caso o proprietário do veículo automotor seja de outro Estado e mude para Minas Gerais deverá providenciar a alteração do endereço no cadastro de seu veículo, com emissão de novo Certificado de Registro de Veículo (CRV) e Certificado de Registro e Licenciamento de Veículo (CRLV).');
        
        // Question 20
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente as afirmações abaixo: a) O proprietário de um veículo automotor que mudar de outro Estado para Minas Gerais deverá providenciar a alteração do endereço no cadastro de seu veículo, com emissão de novo Certificado de Registro de Veículo (CRV) e Certificado de Registro e Licenciamento de Veículo (CRLV). b) As entidades filantrópicas cadastradas e autorizadas pela Secretaria de Estado da Fazenda (SEF) possuem isenção do Documento de Arrecadação Estadual (DAE) no pagamento do Imposto Sobre a Propriedade de Veículos Automotores (IPVA). c) Para realizar o processo de transferência é necessário levar o veículo para vistoria. Se o veículo for alienado, deverá constar no sistema do DETRAN-MG a alienação cadastrada pelo agente financeiro via Sistema Nacional de Gravames (SNG). d) Em relação aos documentos que devem ser apresentados no processo de transferência, o comprovante de endereço deverá ser de até 90 dias e estar em nome do próprio interessado ou parente próximo (cônjuge, pais, irmãos e filhos), mediante apresentação de documento original que comprove o parentesco ou estado civil. e) Na aquisição de um veículo automotor de leilão , a partir da data de aquisição do veículo automotor o adquirente terá 30 dias (corridos) para efetuar a transferência para os casos informados com prazo determinado no documento de arrematação. Após este prazo o adquirente está sujeito a multa por transferência fora do prazo, conforme legislação vigente. Assinale a alternativa CORRETA:');
        $this->addAlternative($questionId, true, 'Todas as afirmativas são verdadeiras.');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto as letras "a" e "d".');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto as letra "d" e "e".');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são falsas.');
        
        // Question 21
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente as afirmativas abaixo: a) Inicialmente, a sinalização de furto/roubo de veículos é feita pela Polícia Militar, via ligação telefônica para o número 190, quando é informado sobre o crime, sendo inserido no sistema o local em que ocorreu o furto/roubo, data, hora, e os dados do solicitante. b) O registro de furto/roubo sob o veículo faz com que o Secretaria da Fazenda suspenda, temporariamente, os tributos como IPVA e licenciamento, pelo período em que a pessoa ficar sem o veículo e evita que possíveis infrações cometidas pelos criminosos com o veículo sejam atribuídas ao proprietário. c) Os veículos dublês, são aqueles que externamente, apresentam as mesmas características do veículo original, como a marca, o modelo e a cor. d) Os danos de veículos envolvidos em acidentes são classificados como: pequena monta, grande monta, extrema monta. e) Para receber o seguro DPVAT não é cobrado nenhuma taxa para recebimento, porém existe a necessidade de contratar terceiros para execução dos procedimentos e serviços referente ao DPVAT. f) VEÍCULOS RECUPERÁVEIS são os veículos que não estão aptos à circulação em via pública e, consequentemente, tem seu registro baixado na Base Estadual e no RENAVAM. Suas peças, entretanto, estarão liberadas para comercialização. g) A atividade de desmontagem, reciclagem, recuperação de partes e peças, e a de comercialização das respectivas partes e peças de veículos automotores somente poderá ser realizada por pessoas jurídicas credenciadas, junto ao DETRAN-MG. Assinale a alternativa CORRETA (considerando V para verdadeiro e F para falso):');
        $this->addAlternative($questionId, true, 'V, V, V, F, F, F, V.');
        $this->addAlternative($questionId, false, 'V, V, F, F, F, V, V.');
        $this->addAlternative($questionId, false, 'V, F, F, F, V, F, F.');
        $this->addAlternative($questionId, false, 'V, V, V, V, F, F, V.');
        
        // Question 22
        $questionId = $this->addQuestion($questionnaireId, 'Os artigos referentes à infrações que geram a suspensão do direito de dirigir no CTB - Código de Trânsito Brasileiro são: a) Art. 165 CTB - Embriaguez. b) Art. 170 CTB - Dirigir ameaçando pedestres. c) Art. 173 CTB - Disputar corrida por espírito de emulação. d) Art. 174 CTB - Promover competição esportiva. e) Art. 175 CTB - Manobra perigosa. f) Art. 176 CTB - Omissão de Socorro. g) Art. 210 CTB - Transpor Bloqueio Policial. h) Art. 244 CTB - Falta de capacete. i) Art. 218, inciso III CTB - Velocidade superior a máxima em mais de 50%. Assinale a alternativa CORRETA:');
        $this->addAlternative($questionId, true, 'Todas as afirmativas são verdadeiras, exceto as letras "c", "d" e "g".');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras.');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são falsas.');
        $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto as letras "b", "c", e "f".    ');
        
        // Question 23
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente as afirmativas abaixo: a) A BIN (sigla para Base de Índice Nacional) é uma base de dados oficial controlada pelo DENATRAN (Departamento Nacional de Trânsito) onde estão armazenadas as principais informações dos veículos. Os veículos ao saírem da fabrica são registrados através do chassi e de suas características na BIN. Os primeiros registros dos veículos nacionais são alimentados pelas Montadoras e dos veículos importados pelas Importadoras. Mas, à medida que os proprietários realizam as vistorias anuais e a atualização do registro nacional, novos dados passam a ser inseridos ou também atualizados no sistema da BIN. b) É de grande importância antes de adquirir um veículo usado confirmar se as suas características atuais e de seus agregados conferem com o que foi montado de fábrica. c) Conduzir veículo com a cor ou característica alterada é considerada infração leve. d) RENAVAM é o Registro Nacional de Veículos Automotores. Trata-se de um grande banco de dados que registra toda a vida do veículo, desde seu “nascimento” (quando o fabricante ou importador registra seus dados originais), passando pelo emplacamento, troca de propriedade, mudança de estado, mudanças de características até sua “morte” quando este sai de circulação. e) Print é uma cópia da tela do sistema do Departamento de Trânsito de Minas Gerais - DETRAN/MG com os dados cadastrados do condutor (Carteira Nacional de Habilitação - CNH) ou do veículo automotor informando a movimentação geral do veículo. Para obter o Print, o Despachante deverá requerer o serviço através do site do DETRAN/MG. f) Falsificar, no todo ou em parte, documento público, ou alterar documento público verdadeiro: Pena: reclusão, de dois a seis anos, e multa. g) Falsificar, no todo ou em parte, documento particular ou alterar documento particular verdadeiro: Pena: reclusão, de um a cinco anos, e multa. Assinale a alternativa CORRETA (considerando V para verdadeiro e F para falso):');
        $this->addAlternative($questionId, true, 'V, V, F, V, V, V, V.');
        $this->addAlternative($questionId, false, 'V, F, F, F, F, V, F.');
        $this->addAlternative($questionId, false, 'V, V, V, F, F, V, V.');
        $this->addAlternative($questionId, false, 'V, F, F, F, F, V, V.');
        
        // Question 24
        $questionId = $this->addQuestion($questionnaireId, 'Ocorre quando um comprador adquire um bem a crédito. O credor (ou seja, aquele que possui o crédito) toma o próprio bem em garantia. O comprador fica como possuidor direto e depositário, com todas as responsabilidades e encargos civis e penais, mas para possuir o bem definitivamente, deve quitar a dívida. Esse procedimento refere-se a:');
        $this->addAlternative($questionId, true, 'Falsificação de documento público.');
        $this->addAlternative($questionId, false, 'Receptação qualificada.');
        $this->addAlternative($questionId, false, 'Alienação Fiduciária.');
        $this->addAlternative($questionId, false, 'Estelionato.');
        
        // Question 25
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente abaixo as atribuições da Ouvidoria da DESPMINAS: a) Receber, registrar, instruir, analisar e dar tratamento formal e adequado às reclamações dos associados, consumidores, clientes e usuários de produtos e serviços dos associados, que não forem solucionadas pelo atendimento habitual realizado pelos associados. b) Prestar os esclarecimentos necessários e dar ciência aos reclamantes acerca do andamento de suas demandas e das providências adotadas. c) Informar aos reclamantes o prazo previsto para resposta final, o qual não pode ultrapassar trinta dias. Assinale a alternativa correta: d) Propor à Diretoria medidas corretivas ou de aprimoramento de procedimentos e rotinas, em decorrência da análise das reclamações recebidas.');
        $this->addAlternative($questionId, true, 'Todas as afirmativas são verdadeiras, excetos as letras "c" e "d".');
	    $this->addAlternative($questionId, false, 'Todas as afirmativas são falsas.');
	    $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras.');
	    $this->addAlternative($questionId, false, 'Todas as afirmativas são verdadeiras, exceto a letra "d".');
        
        // Question 26
        $questionId = $this->addQuestion($questionnaireId, 'Leia atentamente as afirmativas abaixo: a) O Despachante de Veículos associado a DESPMINAS deve agir com respeito, honradez, bom tratamento ao público, e, principalmente, legalidade em suas ações. b) A demissão do Associado dar-se-á a seu pedido, mediante carta dirigida a DESPMINAS, não podendo ser negada, permanecendo o associado responsável por obrigações assumidas até a data da demissão. c) O Associado não será excluído da DESPMINAS havendo justa causa e em razão da prática de atos irregulares, assim reconhecidas em procedimento de sindicância e/ou representação contra o associado. d) Em caso de morte ou incapacidade civil não suprida da pessoa física, ou, ainda, se o associado deixar de atender aos requisitos exigidos para a sua admissão ou permanência na Associação, o Associado será excluído da DESPMINAS. e) Além da penalidade de exclusão do associado, a prática de atos irregulares e/ou representação contra o associado serão apuradas através de sindicância e aplicadas as sanções administrativas de advertência, suspensão e multa de acordo com a gravidade da falta, se leve, média ou grave, respectivamente, assegurada, por qualquer modo, a ampla defesa. Assinale a alternativa correta (considerando V para verdadeiro e F para falso):');
        $this->addAlternative($questionId, true, 'V, V, F, V, V.');
        $this->addAlternative($questionId, false, 'V, V, F, V, F.');
        $this->addAlternative($questionId, false, 'V, F, V, V, F.');
        $this->addAlternative($questionId, false, 'V, V, V, V, F.');
    }
    
    private function addQuestion($questionnaireId, $description)
    {
        $questionId = DB::table('questions')->insertGetId([
            'is_active'             => true,
            'description'           => $description,
            'hint'                  => null,
            'is_required'           => true,
            'question_type_id'      => config('quiz.question_types.CLOSED.id'),
            'questionnaire_id'      => $questionnaireId,
            'weight'                => 1
        ]);
        
        return $questionId;
    }
    
    private function addAlternative($questionId, $is_correct, $description)
    {
        DB::table('alternatives')->insert([
            'description'   => $description,
            'question_id'   => $questionId,
            'value'         => 10,
            'is_correct'    => $is_correct
        ]);
    }
    
}