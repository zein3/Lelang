SET @num := 0;
UPDATE tb_barang SET id_barang = @num := (@num+1);
ALTER TABLE tb_barang AUTO_INCREMENT =1;

SET @num := 0;
UPDATE tb_petugas SET id_petugas = @num := (@num+1);
ALTER TABLE tb_petugas AUTO_INCREMENT =1;

SET @num := 0;
UPDATE tb_masyarakat SET id_user = @num := (@num+1);
ALTER TABLE tb_masyarakat AUTO_INCREMENT =1;

SET @num := 0;
UPDATE history_lelang SET id_history = @num := (@num+1);
ALTER TABLE history_lelang AUTO_INCREMENT =1;

SET @num := 0;
UPDATE tb_lelang SET id_lelang = @num := (@num+1);
ALTER TABLE tb_lelang AUTO_INCREMENT =1;

SET @num := 0;
UPDATE tb_level SET id_level = @num := (@num+1);
ALTER TABLE tb_level AUTO_INCREMENT =1;