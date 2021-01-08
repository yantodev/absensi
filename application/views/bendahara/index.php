<p>Selamat datang <?= $user['name']; ?></p>
<?= $this->session->flashdata('message'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            Rekap Kekurangan Kelas X
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kelas</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>X TKRO 1</td>
                        <td>Rp. <?= number_format($total->xtkro1); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>X TKRO 2</td>
                        <td>Rp. <?= number_format($total->xtkro2); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>X TBSM</td>
                        <td>Rp. <?= number_format($total->xtbsm); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>X AKL</td>
                        <td>Rp. <?= number_format($total->xakl); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">5</td>
                        <td>X OTKP 1</td>
                        <td>Rp. <?= number_format($total->xotkp1); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">6</td>
                        <td>X OTKP 2</td>
                        <td>Rp. <?= number_format($total->xotkp2); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">7</td>
                        <td>X BDP</td>
                        <td>Rp. <?= number_format($total->xbdp); ?></td>
                    </tr>
                    <tr>
                        <td scope="row" colspan="2" align="center"><b>Jumlah</b></td>
                        <td><b>Rp. <?= number_format(
                                        $total->xtkro1 +
                                            $total->xtkro2 +
                                            $total->xtbsm +
                                            $total->xakl +
                                            $total->xotkp1 +
                                            $total->xotkp2 +
                                            $total->xbdp
                                    ); ?>
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm">
            Rekap Kekurangan Kelas XI
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kelas</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>XI TKRO</td>
                        <td>Rp. <?= number_format($total->xitkro); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>X TBSM</td>
                        <td>Rp. <?= number_format($total->xitbsm); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>XI AKL</td>
                        <td>Rp. <?= number_format($total->xiakl); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">5</td>
                        <td>XI OTKP</td>
                        <td>Rp. <?= number_format($total->xiotkp); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">7</td>
                        <td>XI BDP</td>
                        <td>Rp. <?= number_format($total->xibdp); ?></td>
                    </tr>
                    <tr>
                        <td scope="row" colspan="2" align="center"><b>Jumlah</b></td>
                        <td><b>Rp. <?= number_format(
                                        $total->xitkro +
                                            $total->xitbsm +
                                            $total->xiakl +
                                            $total->xiotkp +
                                            $total->xibdp
                                    ); ?>
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm">
            Rekap Kekurangan Kelas XII
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kelas</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>XII TKRO 1</td>
                        <td>Rp. <?= number_format($total->xiitkro1); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>XII TKRO 2</td>
                        <td>Rp. <?= number_format($total->xiitkro2); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>XII TBSM</td>
                        <td>Rp. <?= number_format($total->xiitbsm); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>XII AKL 1</td>
                        <td>Rp. <?= number_format($total->xiiakl1); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>XII AKL 2</td>
                        <td>Rp. <?= number_format($total->xiiakl2); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">5</td>
                        <td>XII OTKP 1</td>
                        <td>Rp. <?= number_format($total->xiiotkp1); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">6</td>
                        <td>XII OTKP 2</td>
                        <td>Rp. <?= number_format($total->xiiotkp2); ?></td>
                    </tr>
                    <tr>
                        <td scope="row">7</td>
                        <td>XII BDP</td>
                        <td>Rp. <?= number_format($total->xiibdp); ?></td>
                    </tr>
                    <tr>
                        <td scope="row" colspan="2" align="center"><b>Jumlah</b></td>
                        <td><b>Rp. <?= number_format(
                                        $total->xiitkro1 +
                                            $total->xiitkro2 +
                                            $total->xiitbsm +
                                            $total->xiiakl1 +
                                            $total->xiiakl2 +
                                            $total->xiiotkp1 +
                                            $total->xiiotkp2 +
                                            $total->xiibdp
                                    ); ?>
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>