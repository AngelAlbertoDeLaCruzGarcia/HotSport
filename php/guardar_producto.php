<?php
	require('conexion.php');
	$id=$_POST['codigo'];
	$nombre=$_POST['nombreP'];
	$descripcion=$_POST['Descripcion'];
	$categoria=$_POST['cat'];
	$marca=$_POST['marca'];
	$talla=$_POST['talla'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	if(isset($_FILES["foto"]["name"]))
    {
        $nomA=$_FILES["foto"]["name"];
        $tamA=$_FILES["foto"]["size"];
        $tipoA=$_FILES["foto"]["type"];

        if($tipoA=="image/jpeg"||$tipoA=="image/png"){
            if($tamA<=5000000){
                $rand=rand(100,1000);
                $origen=$_FILES["foto"]["tmp_name"];
                $nom=rand.$_FILES["foto"]["name"];
                $destino="../user/img/".$nom;
                move_uploaded_file($origen,$destino);
				$searchNom=mysqli_query($conexion,"SELECT intIdproducto  FROM tblproductos where intIdproducto=$id");
				$rows=($searchNom);
			
				if(mysqli_num_rows($rows)==0)
				{
					$insertar=mysqli_query($conexion,"CALL spinsertprod($id,'$nombre','$nom','$descripcion','$categoria','$marca','$talla',$cantidad,$precio)");
					if (!$insertar)
					{
						echo  "<script type=\"text/javascript\">alert(\"Error guardar los datos intente de nuevo\");</script>";
					}
					else
					{
						header("Location:../admi/list_Productos.php");
							echo "se guardaron los datos";
					}
				}
				else
				echo"<script type=\"text/javascript\">alert(\"Error codigo de producto repetido\");</script>";
				echo"<script>window.location='../admi/frm_productos.php';</script>";
            }
            else
            echo"<script type=\"text/javascript\">alert(\"La imagen es muy pesada:(\");</script>";
            echo"<script>window.location='../admi/frm_productos.php';</script>";
            
        }
        else
        echo"<script type=\"text/javascript\">alert(\"Archivo no compatible solo admite formato JPG o PNG:(\");</script>";
        echo"<script>window.location='../admi/frm_productos.php';</script>";
        
    }

    

?>
