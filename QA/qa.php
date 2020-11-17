<?php
	if (
		isset($_POST['darray']) && 
		isset($_POST['inicio']) && 
		isset($_POST['fim']) && 
		isset($_POST['vp']) && 
		isset($_POST['ordem'])
	) 
	{

		if (
			is_numeric($_POST['darray']) &&
			is_numeric($_POST['inicio'])&& 
			is_numeric($_POST['fim']) && 
			is_numeric($_POST['vp'])
		) 
		{
		
			$dimensao=$_POST['darray'];
			$inicio=$_POST['inicio'];
			$fim=$_POST['fim'];
			$vp=$_POST['vp'];
			$ordem=$_POST['ordem'];
			$soma=0;
			$produto=1;
			$numtrocas=0;
			$vetor = array();



		//fazer o vetor
			for ($i=0;$i<=$dimensao ; $i++) { 
				$num=rand($inicio,$fim);
				if (count($vetor)>0) {
					while (in_array($num, $vetor)) {
						$num=rand($inicio,$fim);
					}
				}
					$vetor[]=$num;
				
			}



		//escrever array
			echo 'Valores gerados para Array: ';
			foreach ($vetor as $valor) {
				echo $valor. ' ';
			}
			echo '<br><br>';



			//dizer a posicao do valor escolhido

			foreach ($vetor as $chave => $valor) {
				if($vp==$valor){
					echo 'O valor ' .$vp. ' encontra-se na posição ' .$chave. ' do vetor<br><br>';
				}
			//fazer a soma dos valores no array
				$soma+=$valor;


			//fazer o produto dos valores do array
				$produto*=$valor;

			}
			//escrever a soma
			echo 'Soma dos valores do array: ' .$soma;
			echo '<br><br>';

			//escrever o produto
			echo 'Produto dos valores do array: '.$produto;
			echo '<br><br>';


			//fazer a media dos valores do array
			$media=$soma/$dimensao;

			echo 'Media dos valores do array: '.$media;
			echo '<br><br>';



			// escrever os valores do array por ordem
			//ordem crescente
			if ($ordem==1) {
				echo 'Valores do Array por ordem Crescente';
				for($j=0;$j<$dimensao;$j++){
					for ($i=0; $i < $dimensao; $i++) {

						if ($vetor[$i]>$vetor[$i+1]) {
							$numtrocas+=1;
							$valor=$vetor[$i];
							$vetor[$i]=$vetor[$i+1];
							$vetor[$i+1]=$valor;
						}
					}
				}
			}


			//ordem decrescente
			else{
				echo 'Valores do Array por ordem Decrescente';
				for($j=0;$j<$dimensao;$j++){
					for ($i=0; $i < $dimensao; $i++) {

						if ($vetor[$i]<$vetor[$i+1]) {
							$numtrocas+=1;
							$valor=$vetor[$i];
							$vetor[$i]=$vetor[$i+1];
							$vetor[$i+1]=$valor;
						}
					}
				}
			}

			//escrever o array ordenado
			foreach ($vetor as $chave => $valor) {
				echo ' '.$valor;
			}


			//dizer quantas trocas foram percisas fazer para por o array por ordem
			echo '<br>Durante a execucao desta parte foram realizadas '.$numtrocas.' trocas';
		}
		else{
			echo "ERROR!!!";
		}
	}
?>