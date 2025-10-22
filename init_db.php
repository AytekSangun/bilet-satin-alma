<?php
require 'src/core/Database.php';

use App\Core\Database;

try {
    echo "Veritabanı bağlantısı kuruluyor...\n";
    $pdo = Database::getConnection();

    echo "Veritabanı şeması (schema.sql) okunuyor...\n";
    $sql = file_get_contents('database/schema.sql');

    echo "Tablolar oluşturuluyor...\n";
    $pdo->exec($sql);

    echo "Veritabanı ve tablolar başarıyla oluşturuldu!\n";
    echo "database/app.db dosyası artık kullanılabilir.\n";

} catch (\Exception $e) {
    die("Bir hata oluştu: " . $e->getMessage());
}