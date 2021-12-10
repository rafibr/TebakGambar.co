INSERT INTO `rule_bayars` (
        `id`,
        `kode_rule`,
        `nama_rule`,
        `jlh_bayar`,
        `keterangan`,
        `created_at`,
        `updated_at`
    )
VALUES (NULL, '1nwb', 'Newbie', '0', 'Status Newbie', NULL, NULL),
    (NULL, '2ntv', 'Newbie => Verified', '0', 'Status naik tingkat newbie => verified', NULL, NULL),
    (NULL, '3vtv_almos', 'Verified < 100%', '0', 'Status verified di bawah 100%', NULL, NULL),
    (NULL, '4vtv_perfe', 'Verified 100%', '0', 'Status verified 100%', NULL, NULL),
    (NULL, '5hth_almos', 'Human < 100%', '0', 'Status human di bawah 100%', NULL, NULL),
    (NULL, '6hth_perfe', 'Human 100%', '0', 'Status human 100%', NULL, NULL),
    (NULL, '7fail', 'Gagal', '0', 'Status gagal validasi', NULL, NULL);
