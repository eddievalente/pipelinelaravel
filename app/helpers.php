<?php

  function get_today() {
    $data = date("d/m/Y");
    $dtpost = explode("/", $data);
    list($dia, $mes, $ano) = $dtpost;
    $data = $ano.'-'.$mes.'-'.$dia;
    return $data;
  }

  function get_data_dia($data) {
    $dt = substr($data,0,10);
    $dtpost = explode("-", $dt);
    list($ano, $mes, $dia) = $dtpost;
    return $dia;
  }
  
  function get_days_forward($days,$dt='',$a_partir_da_data=0) {
    if ( empty($dt) ) $dt = get_today();
    if ( $a_partir_da_data == 1 ) $days--;
    return date('Y-m-d', strtotime($dt. ' + '.$days.' days'));
  }
  
  function get_datavalida($data) {
    $dt = '';
    if ( $data == '0000-00-00 00:00:00') $data = '';
    if ( $data == '0000-00-00') $data = '';
    if ( !empty($data) ) $dt = $data;
    return $dt;
  }
  
  function get_strdata($data) {
    $dt = '';
    if ( $data == '0000-00-00 00:00:00') $data = '';
    if ( $data == '0000-00-00') $data = '';
    if ( !empty($data) ) $dt = Date('d/m/Y', strtotime($data));
    return $dt;
  }
  
  function get_prioridade_cor($prioridade) {
    if ( $prioridade == 1 ) $ret = '#95a5a6'; // concrete
    elseif ( $prioridade == 2 ) $ret = '#3498db'; // peterriver
    elseif ( $prioridade == 3 ) $ret = '#1abc9c'; // turquoise
    elseif ( $prioridade == 4 ) $ret = '#27ae60'; // nephritis
    elseif ( $prioridade == 5 ) $ret = '#f1c40f'; // sunflower
    elseif ( $prioridade == 6 ) $ret = '#e67e22'; // carrot
    elseif ( $prioridade == 7 ) $ret = '#c0392b'; // pomegranate
    else $ret = 'silver';
    return $ret;
  }

  function get_prioridade($prioridade) {
    if ( $prioridade == 1 ) $ret = 'Não Prioritária'; 
    elseif ( $prioridade == 2 ) $ret = 'Baixa'; 
    elseif ( $prioridade == 3 ) $ret = 'Normal a Baixa';
    elseif ( $prioridade == 4 ) $ret = 'Normal';
    elseif ( $prioridade == 5 ) $ret = 'Média';
    elseif ( $prioridade == 6 ) $ret = 'Alta';
    elseif ( $prioridade == 7 ) $ret = 'Atenção Imediata';
    else $ret = 'Não Definida';
    return $ret;
  }

  // sem gravidade / pode esperar / não irá mudar;
  // pouco grave / pouco urgente / piorar a longo prazo;
  // grave / merece atenção em pouco prazo / piorar a médio prazo;
  // muito grave / muito urgente / piorar a curto prazo;
  // extremamente grave / necessidade de atenção imediata / piorar rapidamente
  function get_vet_prioridade($opcao=0) {
    $sel_op_0 = $sel_op_1 = $sel_op_2 = $sel_op_3 = $sel_op_4 = $sel_op_5 = $sel_op_6 = $sel_op_7 = '';      
    if ( $opcao == 0 ) $sel_op_0 = ' selected ';
    elseif ( $opcao == 1 ) $sel_op_1 = ' selected ';
    elseif ( $opcao == 2 ) $sel_op_2 = ' selected ';
    elseif ( $opcao == 3 ) $sel_op_3 = ' selected ';
    elseif ( $opcao == 4 ) $sel_op_4 = ' selected ';
    elseif ( $opcao == 5 ) $sel_op_5 = ' selected ';
    elseif ( $opcao == 6 ) $sel_op_6 = ' selected ';
    elseif ( $opcao == 7 ) $sel_op_7 = ' selected ';
    $ret = '<select name="prioridade" id="prioridade" >
      <option value="0" '.$sel_op_0.'>'.get_prioridade(0).'</option>
      <option value="1" '.$sel_op_1.'>'.get_prioridade(1).'</option>
      <option value="2" '.$sel_op_2.'>'.get_prioridade(2).'</option>
      <option value="3" '.$sel_op_3.'>'.get_prioridade(3).'</option>
      <option value="4" '.$sel_op_4.'>'.get_prioridade(4).'</option>
      <option value="5" '.$sel_op_5.'>'.get_prioridade(5).'</option>
      <option value="6" '.$sel_op_6.'>'.get_prioridade(6).'</option>
      <option value="7" '.$sel_op_7.'>'.get_prioridade(7).'</option>
      </select>
      ';
    return $ret;
  }
  
  function get_progresso($progresso) {      
    if ( $progresso == 0 ) $ret = 'Não Iniciada'; 
    elseif ( $progresso == 10 ) $ret = '10% Entendendo...';
    elseif ( $progresso == 20 ) $ret = '20% Entendida';
    elseif ( $progresso == 30 ) $ret = '30% Working on';
    elseif ( $progresso == 60 ) $ret = '60% Working on, almost done';
    elseif ( $progresso == 70 ) $ret = '70% Revisando';
    elseif ( $progresso == 90 ) $ret = '90% Entregue';
    elseif ( $progresso == 100 ) $ret = 'Concluída';
    else {
      $ret = $progresso.'%';
    }
    return $ret;
  }
  
  function get_vet_progresso($opcao=0) {
    $sel_op_0 = $sel_op_10 = $sel_op_20 = $sel_op_30 = $sel_op_60 = $sel_op_70 = $sel_op_90 = $sel_op_100 = '';      
    if ( $opcao == 0 ) $sel_op_0 = ' selected ';
    elseif ( $opcao == 10 ) $sel_op_10 = ' selected ';
    elseif ( $opcao == 20 ) $sel_op_20 = ' selected ';
    elseif ( $opcao == 30 ) $sel_op_30 = ' selected ';
    elseif ( $opcao == 60 ) $sel_op_60 = ' selected ';
    elseif ( $opcao == 70 ) $sel_op_70 = ' selected ';
    elseif ( $opcao == 90 ) $sel_op_90 = ' selected ';
    elseif ( $opcao == 100 ) $sel_op_100 = ' selected ';
    $ret = '<select name="progresso" id="progresso" >
      <option value="0" '.$sel_op_0.'>'.get_progresso(0).'</option>
      <option value="10" '.$sel_op_10.'>'.get_progresso(10).'</option>
      <option value="20" '.$sel_op_20.'>'.get_progresso(20).'</option>
      <option value="30" '.$sel_op_30.'>'.get_progresso(30).'</option>
      <option value="60" '.$sel_op_60.'>'.get_progresso(60).'</option>
      <option value="70" '.$sel_op_70.'>'.get_progresso(70).'</option>
      <option value="90" '.$sel_op_90.'>'.get_progresso(90).'</option>
      <option value="100" '.$sel_op_100.'>'.get_progresso(100).'</option>
      </select>
      ';
    return $ret;
  }
  
  function get_progresso_vies($indicador) {
    if ( $indicador == 1 ) $ret = 'Não Será Entregue'; 
    elseif ( $indicador == 2 ) $ret = 'Atraso'; 
    elseif ( $indicador == 3 ) $ret = 'Provável Atraso';
    elseif ( $indicador == 4 ) $ret = 'Dentro do Planejado';
    elseif ( $indicador == 5 ) $ret = 'Provável Adiantamento';
    elseif ( $indicador == 6 ) $ret = 'Entrega Adiantada';
    elseif ( $indicador == 7 ) $ret = 'Entrega Concluída';
    else $ret = '';
    return $ret;
  }
  
  function get_vet_progresso_vies($opcao=0) {
    $sel_op_1 = $sel_op_2 = $sel_op_3 = $sel_op_4 = $sel_op_5 = $sel_op_6 = $sel_op_7 = '';      
    if ( $opcao == 1 ) $sel_op_1 = ' selected ';
    elseif ( $opcao == 2 ) $sel_op_2 = ' selected ';
    elseif ( $opcao == 3 ) $sel_op_3 = ' selected ';
    elseif ( $opcao == 4 ) $sel_op_4 = ' selected ';
    elseif ( $opcao == 5 ) $sel_op_5 = ' selected ';
    elseif ( $opcao == 6 ) $sel_op_6 = ' selected ';
    elseif ( $opcao == 7 ) $sel_op_7 = ' selected ';
    $ret = '<select name="indicador" id="indicador" >
      <option value="1" '.$sel_op_1.'>'.get_progresso_vies(1).'</option>
      <option value="2" '.$sel_op_2.'>'.get_progresso_vies(2).'</option>
      <option value="3" '.$sel_op_3.'>'.get_progresso_vies(3).'</option>
      <option value="4" '.$sel_op_4.'>'.get_progresso_vies(4).'</option>
      <option value="5" '.$sel_op_5.'>'.get_progresso_vies(5).'</option>
      <option value="6" '.$sel_op_6.'>'.get_progresso_vies(6).'</option>
      <option value="7" '.$sel_op_7.'>'.get_progresso_vies(7).'</option>
      </select>
      ';
    return $ret;
  }
  
  function get_schedule_title() {
    $ret = '';
    for ( $i = 0; $i < 20; $i++ ) { 
      $data = get_days_forward($i);
      $dia = get_data_dia($data);
      $ret .= '<td style="border:0; width: 5%; padding: 3px 0; text-align: center; ">'.$dia.'</td>
        ';
    }
    return $ret;
  }
  
  // verifica se a data está no período informado
  // true - se está no período
  // início não informado -> verifica se data é anterior ao término
  // término não informado -> verifica se data é posterior ao início
  function is_scheduled($data, $dtinicio, $dttermino) {
    $dt = get_datavalida($data);  
    $inicio = get_datavalida($dtinicio);   
    $termino = get_datavalida($dttermino);   
    $ret = false;
    if ( empty($dt) ) {
      $ret = false;
    } elseif ( ( empty($inicio) ) && ( empty($termino) ) ) {
      $ret = false;
    } elseif ( empty($inicio) ) {
      $ret = ( $dt == $termino );
    } elseif ( empty($termino) ) {
      $ret = ( $dt == $inicio );
    } else {
      $ret = ( ( $dt >= $inicio ) && ( $dt <= $termino ) );
    }
    return $ret;
  } 
  
  function get_schedule($dtinicio,$dtentrega,$prioridade) {
    $cor_prioridade = get_prioridade_cor($prioridade);
    $ret = '';
    $cor_fundo = 'transparent';
    $cor_fonte = 'silver';
    for ( $i = 0; $i < 20; $i++ ) { 
      $data = get_days_forward($i);
      // verifica se tarefa está sendo executada na data
      if ( is_scheduled($data, $dtinicio, $dtentrega) ) {
        $cor_fundo = $cor_prioridade;
        $cor_fonte = 'black';
      } else {
        $cor_fundo = '#ecf0f1';
        $cor_fonte = $cor_prioridade;
      }
      $ret .= '<td style="border:0; width: 5%; padding: 3px 0; text-align: center;background: '.$cor_fundo.'; ">&nbsp;</td>
        ';
    }
    return $ret;
  }
  
  function get_str_progresso($dtinicio,$progresso,$indicador) {
    $dthoje = get_today();
    $inicio = get_datavalida($dtinicio);
    $ret = get_progresso($progresso);
    if ( $progresso == 0 ) {
      if ( !empty($inicio) )  {
        if ( $dthoje > $inicio ) {
          $ret .= ' ( início previsto '.get_strdata($inicio).' &bull; atrasada )';
        } else {
          $ret .= ' ( início previsto '.get_strdata($inicio).' )';
        }
      }
    }
    if ( $indicador <> 4 ) $ret .= ' &bull; '.get_progresso_vies($indicador);
    return $ret;
  }
  
  