<?php

	header("Content-Type: text/html; charset=UTF-8",true);

	$f = fopen('POST_DATA.txt', 'a');

	fwrite($f, 'Registro recebido em: '.$_POST['dataH_transmiss']."\r\n\r\n");
	fwrite($f, 'id_app: '.$_POST['id_app']."\r\n");
    fwrite($f, 'nome_user: '.$_POST['nome_user']."\r\n");
    fwrite($f, 'nome_munic: '.$_POST['nome_munic']."\r\n");
    fwrite($f, 'nome_local: '.$_POST['nome_local']."\r\n");
    fwrite($f, 'aplic_data: '.$_POST['aplic_data']."\r\n");
    fwrite($f, 'questio: '.$_POST['questio']."\r\n");
    fwrite($f, 'genero: '.$_POST['genero']."\r\n");
    fwrite($f, 'idade: '.$_POST['idade']."\r\n");
    fwrite($f, 'escola: '.$_POST['escola']."\r\n");
    fwrite($f, 'formacao: '.$_POST['formacao']."\r\n");
    fwrite($f, 'est_civil: '.$_POST['est_civil']."\r\n");
    fwrite($f, 'cren_relig: '.$_POST['cren_relig']."\r\n");
    fwrite($f, 'renda_mens: '.$_POST['renda_mens']."\r\n");
    fwrite($f, 'comunica: '.$_POST['comunica']."\r\n");
    fwrite($f, 'emissora_rd: '.$_POST['emissora_rd']."\r\n");
    fwrite($f, 'uso_internet: '.$_POST['uso_internet']."\r\n");
    fwrite($f, 'rede_social: '.$_POST['rede_social']."\r\n");
    fwrite($f, 'espPref: '.$_POST['espPref']."\r\n");
    fwrite($f, 'espRej: '.$_POST['espRej']."\r\n");
    fwrite($f, 'estiPref: '.$_POST['estiPref']."\r\n");
    fwrite($f, 'estiPref2: '.$_POST['estiPref2']."\r\n");
    fwrite($f, 'estiRej: '.$_POST['estiRej']."\r\n");
    fwrite($f, 'espVer: '.$_POST['espVer']."\r\n");
    fwrite($f, 'proj_cand: '.$_POST['proj_cand']."\r\n");
    fwrite($f, 'influ_familia: '.$_POST['influ_familia']."\r\n");
    fwrite($f, 'grp_politico: '.$_POST['grp_politico']."\r\n");
    fwrite($f, 'hist_cand: '.$_POST['hist_cand']."\r\n");
    fwrite($f, 'part_cand: '.$_POST['part_cand']."\r\n");
    fwrite($f, 'propag_eleit: '.$_POST['propag_eleit']."\r\n");
    fwrite($f, 'maior_lider_brt: '.$_POST['maior_lider_brt']."\r\n");
    fwrite($f, 'maior_lider_local: '.$_POST['maior_lider_local']."\r\n");
    fwrite($f, 'lider_crist: '.$_POST['lider_crist']."\r\n");
    fwrite($f, 'lider_edils: '.$_POST['lider_edils']."\r\n");
    fwrite($f, 'lider_cleb: '.$_POST['lider_cleb']."\r\n");
    fwrite($f, 'lider_cleit: '.$_POST['lider_cleit']."\r\n");
    fwrite($f, 'lider_kleber: '.$_POST['lider_kleber']."\r\n");
    fwrite($f, 'lider_edsonrib: '.$_POST['']."\r\n");
    fwrite($f, 'lider_cleb: '.$_POST['lider_cleb']."\r\n");
    fwrite($f, 'lider_cleit: '.$_POST['lider_cleit']."\r\n");
    fwrite($f, 'lider_kleber: '.$_POST['lider_kleber']."\r\n");
    fwrite($f, 'lider_edsonrib: '.$_POST['lider_edsonrib']."\r\n");
    fwrite($f, 'lider_pref: '.$_POST['lider_pref']."\r\n");
    fwrite($f, 'lider_vice: '.$_POST['lider_vice']."\r\n");
    fwrite($f, 'lider_acmn: '.$_POST['lider_acmn']."\r\n");
    fwrite($f, 'lider_rui: '.$_POST['lider_rui']."\r\n");
    fwrite($f, 'lider_otto: '.$_POST['lider_otto']."\r\n");
    fwrite($f, 'lider_leao: '.$_POST['lider_leao']."\r\n");
    fwrite($f, 'lider_wagner: '.$_POST['lider_wagner']."\r\n");
    fwrite($f, 'avalPref: '.$_POST['avalPref']."\r\n");
    fwrite($f, 'melhor_acao: '.$_POST['melhor_acao']."\r\n");
    fwrite($f, 'pior_acao: '.$_POST['pior_acao']."\r\n");
    fwrite($f, 'aval_agric: '.$_POST['aval_agric']."\r\n");
    fwrite($f, 'aval_educ: '.$_POST['aval_educ']."\r\n");
    fwrite($f, 'aval_saude: '.$_POST['aval_saude']."\r\n");
    fwrite($f, 'aval_finan: '.$_POST['aval_finan']."\r\n");
    fwrite($f, 'aval_social: '.$_POST['aval_social']."\r\n");
    fwrite($f, 'aval_obras: '.$_POST['aval_obras']."\r\n");
    fwrite($f, 'aval_transp: '.$_POST['aval_transp']."\r\n");
    fwrite($f, 'aval_admin: '.$_POST['aval_admin']."\r\n");
    fwrite($f, 'aval_seg: '.$_POST['aval_seg']."\r\n");
    fwrite($f, 'aval_saneam: '.$_POST['aval_saneam']."\r\n");
    fwrite($f, 'aval_agua: '.$_POST['aval_agua']."\r\n");
	fwrite($f, 'Header: '.$_POST['header']."\r\n\r\n");
    fwrite($f, "Final: Chegamos ao Fim do Registro!\r\n");
	fclose($f);
	
	echo "Mensagem recebida com sucesso\r\n";

?>