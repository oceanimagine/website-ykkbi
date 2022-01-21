SELECT 
    z.no_anggota,
    z.kode_produk, 
    z.produk, 
    z.norek, 
    z.angsuran, 
    z.jasa, 
    z.pinjaman_pokok, 
    z.jenis, 
    z.saldo, 
    z.id, 
    DATEDIFF(DATE_FORMAT('2021-10-31','%Y-%m-%d'),z.tgl_trans), 
    DATE_FORMAT(DATE_ADD(z.tgl_trans, INTERVAL 1 MONTH), '%Y-%m') 
FROM 
	t_ac_anggota z,(
    	SELECT 
            b.no_anggota, 
            b.nama, 
            b.kel_wajib,
            (select count(a.id) FROM t_ac_anggota a WHERE a.no_anggota=b.no_anggota AND a.jenismodal = 'WAJIB') jumlah,
            (select c.kode_produk FROM t_ac_anggota c WHERE c.no_anggota=b.no_anggota AND c.jenismodal = 'WAJIB') kode_produk,
            (
                SELECT COUNT(e.id) FROM t_kartusim e WHERE 
                DATE_FORMAT(e.tgl_transaksi,'%m-%Y')=DATE_FORMAT('2021-10-31','%m-%Y') AND 
                e.no_anggota = b.no_anggota  AND 
                e.kode_produk = (
                    select d.kode_produk FROM t_ac_anggota d WHERE d.no_anggota=b.no_anggota AND d.jenismodal = 'WAJIB'
                )
            ) has_setor_wajib
        FROM t_anggota b 
        WHERE b.`status`='1' AND 
        b.jenis_agt='BIASA' AND 
        b.payroll_opr='005' AND 
        b.kel_wajib != ''
    ) x
WHERE 
    z.jenis IN('Flat','Menurun','Efektif','') AND 
    z.saldo > 0 AND
    z.no_anggota = x.no_anggota
order by z.no_anggota asc