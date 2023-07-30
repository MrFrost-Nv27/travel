<br />
<div class="card">
    <div class="card-header" style="background-color:#0000CD;">
        <h3 class="card-title">
            <font color="#ffffff">
                <i class="fas fa-users nav-icon"></i>
                Data Master Peran
        </h3>
    </div>
    <div class="card-body" style="color: black;">
        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" style="background-color:#0000CD;"
            data-target="#modal-tambah"><i class="fas fa-plus"></i>
            Tambah Data Peran</button>
        <table id="example1" name="example1" class="table table-sm table-hover table-bordered table-striped deta">
            <thead>
                <tr>
                    <th bgcolor="#ffffff" style="width:5%">
                        <font color="#000000">NO</font>
                    </th>
                    <th bgcolor="#ffffff">
                        <font color="#000000">PERAN </font>
                    </th>
                    <th bgcolor="#ffffff">
                        <center>
                            <font color="#000000">AKSI</font>
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
$no = 1;
$query = "SELECT * FROM tb_peran ORDER BY Id ASC";

$sql_pengguna = mysqli_query($con, $query) or die(mysqli_error($con));

if (mysqli_num_rows($sql_pengguna) > 0) {
    while ($data = mysqli_fetch_array($sql_pengguna)) {
        ?>
                <tr>
                    <td>
                        <?=$no++;?>
                    </td>

                    <td>
                        <h6>
                            <?=$data['peran'];?>
                        </h6>
                    </td>



                    <td>
                        <center>

                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-id="<?=$data['id']?>" data-user="<?=$data['peran']?>" data-target="#modal-edit"><i
                                    class="fas fa-edit"></i>
                            </button>

                            <a href="hapus.php?id=<?=$data['id'];?>"
                                onclick="return confirm('Anda akan menghapus data kandang  [ <?=$data['peran'];?> ] ?')"
                                class="btn btn-danger btn-xs"><i class="fas fa-trash"></i>
                            </a>
                    </td>
                    </center>



                </tr>

                <?php
}

} else {
    echo "<tr><td colspan=\"11\" align=\"center\"><h6>Data Tidak Ditemukan!</h6></td></tr>";
}

?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0000CD;">
                <h4 class="modal-title">
                    <font color="#ffffff"><i class="fas fa-user-circle"></i> Tambah Peran</font>
                </h4>
            </div>
            <form class="form-horizontal" action="tambahperan.php" method="POST" id="peranan">
                <div class="modal-body">
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 control-label">peran</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="peran" id="peran" required>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                        class="fas fa-times"></i></button>
                                <button type="submit" name="insertdata" class="btn btn-secondary"
                                    style="background-color:#0000CD"><i class="fas fa-download"></i> Simpan
                                    Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0000CD;">
                <h4 class="modal-title">
                    <font color="#ffffff"><i class="fas fa-edit"></i> Edit Master Peran</font>
                </h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan">
                <div class="modal-body">

                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" name="ided">
                                        <!-- <input type="text" class="form-control" name="usered"> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 control-label">Peran</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="peran">
                                    </div>
                                </div>


                                <!-- /.card-body -->
                                <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                            class="fas fa-times"></i></button>
                                    <button type="submit" name="editmodal" class="btn btn-secondary"
                                        style="background-color:#0000CD"><i class="fas fa-edit"></i> Edit
                                        Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
</div>