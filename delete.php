

<?php 
$id = $_GET['id'];
$connection = new PDO('mysql:dbname=project1;host=localhost', 'root', '');
$statement = $connection->prepare('delete from teachers where id=:id');
$statement->execute([
  ':id' => $id
]);

header('location:index.php');



?>

<html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

function del(id){
  Swal.fire({
  title: 'Yakin menghapus?',
  text: "Data yang sudhah dihapus tidak dapat dikembalikan!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, hapus sekarang!'
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: 'Terhapus!',
        text: 'Data berhasil dihapus.',
        icon: 'success',
        showConfirmButton: false
      });
      $.ajax({
        type:"delete",
        url: "back/rule/kontak_blog/del", //url function delete in controller
        data:{
          id:id //id get from button delete
        },
        success:function(data){ //when success will reload page after 3 second
         window.setTimeout( function(){ 
             location.reload();
         }, 300 );
        }
      });
    }
  })
}

</html>