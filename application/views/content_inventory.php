<section class="section">
    <div class="section-header">
        <h1>Posts</h1>
        <div class="section-header-button">
            <a href="<?= base_url('inventory/add_new');?>"
                class="btn btn-icon btn-primary icon-left btn-primary"><i class="fas fa-plus"></i>Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('home');?>">Home</a></div>
            <div class="breadcrumb-item">Inventory</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Inventory</h2>
        <p class="section-lead">
            This page contains stock data on available goods.
        </p>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inventory Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover data-table2">
                                <thead>
                                    <tr>
                                        <th>ITEM CODE</th>
                                        <th>ITEM NAME</th>
                                        <th>PRICE</th>
                                        <th>STOCK</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                      foreach ($record_inventory as $r)
                                        {

                                        echo'
                                            <tr>
                                                <td>'.$r->id_item.'</td>
                                                <td>'.$r->item_name.'</td>
                                                <td>'.$r->price.'</td>
                                                <td>'.$r->stock.'</td>
                                                <td>
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cogs"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item has-icon" href="'.base_url().'inventory/edit/'.$r->id_item.'"><i class="fas fa-user-edit"></i> Ubah</a>
                                                <div class="dropdown-divider"></div> 
                                                <a class="dropdown-item has-icon delete-modal text-danger" href="'.base_url().'inventory/del_stock/'.$r->id_item.'" data-confirm="Apakah anda yakin ingin menghapus barang ini : '.$r->item_name.' ?"><i class="far fa-trash-alt"></i> Hapus</a>
                                                </div>
                                                </td>
                                            </tr>';
                                        }  
                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>