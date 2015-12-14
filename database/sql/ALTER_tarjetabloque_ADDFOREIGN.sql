ALTER TABLE tarjetabloque ADD FOREIGN KEY(idbloque) REFERENCES bloque(idbloque);
ALTER TABLE `tarjetabloque` DROP INDEX `idbloque`, ADD INDEX `tarjetabloque_idbloque_foreign` (`idbloque`) COMMENT '';
