<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('inventory');?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Add Stock Inventory</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('home');?>">Home</a></div>
            <div class="breadcrumb-item"><a href="<?= base_url('inventory');?>">Inventory</a></div>
            <div class="breadcrumb-item">Add Stock Inventory</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Add New Stock Inventory</h2>
        <p class="section-lead">
            This page contains form add stock data on Inventory.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Add Stock Inventory</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('inventory/do_edit'); ?>" method="POST" class="needs-validation" novalidate="" accept-charset="utf-8">
                            <input type="hidden" name="id_item" value="<?=$r['id_item'];?>">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ITEM CODE</label>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" class="form-control" name="id_item" value="<?=$r['id_item'];?>" required="">
                                    <div class="invalid-feedback">
                                        Please complete first
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ITEM NAME</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" class="form-control" name="item_name" value="<?=$r['item_name'];?>" required="">
                                    <div class="invalid-feedback">
                                        Please complete first
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">PRICE</label>
                                <div class="col-sm-12 col-md-2">
                                    <input type="text" class="form-control" name="price" value="<?=$r['price'];?>" required="">
                                    <div class="invalid-feedback">
                                        Please complete first
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">STOCK</label>
                                <div class="col-sm-12 col-md-1">
                                    <input type="text" class="form-control" name="stock" value="<?=$r['stock'];?>" required="">
                                    <div class="invalid-feedback">
                                        Please complete first
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    <button class="btn btn-danger" type="reset">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="float-left">
                            HOME-TEST
                        </div>
                        <div class="float-right">
                            Form Add Stock Inventory
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

