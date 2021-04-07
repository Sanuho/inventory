<!-- TABLE DETAIL -->
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Detail No</th>
                                        <th>Item Name</th>
                                        <th>QTY</th>
                                        <th>Note</th>
                                        <th>Header No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="isi_tabel">
                                </tbody>
                                <tfoot>
                                    <td colspan="5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalthree"><i class="fa fa-plus-square"></i> Add</button>

                                        &nbsp;
                                        <a href="report/req_pdf.php?kode=<?php echo $hasilkode; ?>" target="_blank" onclick="return confirm('Print Report?')">
                                            <button data-toggle="tooltip" data-placement="left" title="Print Request" class="btn btn-lime lime-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-sent"></i></button></a>

                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>