<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614173457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE about (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, images_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, avis VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, INDEX IDX_8F91ABF0D44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_food (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chefs (id INT AUTO_INCREMENT NOT NULL, images_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, twitter VARCHAR(255) NOT NULL, facebook VARCHAR(255) NOT NULL, instagram VARCHAR(255) NOT NULL, linkedin VARCHAR(255) NOT NULL, INDEX IDX_5295C000D44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, facebook VARCHAR(255) NOT NULL, twitter VARCHAR(255) NOT NULL, youtube VARCHAR(255) NOT NULL, instagram VARCHAR(255) NOT NULL, linkedin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE features (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food (id INT AUTO_INCREMENT NOT NULL, categories_food_id INT DEFAULT NULL, images_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix VARCHAR(255) NOT NULL, INDEX IDX_D43829F792845664 (categories_food_id), INDEX IDX_D43829F7D44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, chemin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, is_dropdown TINYINT(1) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, images_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, bouton1 VARCHAR(255) NOT NULL, bouton2 VARCHAR(255) NOT NULL, INDEX IDX_CFC71007D44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_menu (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, nomm VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_F30864DFCCD7E912 (menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE chefs ADD CONSTRAINT FK_5295C000D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F792845664 FOREIGN KEY (categories_food_id) REFERENCES categories_food (id)');
        $this->addSql('ALTER TABLE food ADD CONSTRAINT FK_D43829F7D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE slider ADD CONSTRAINT FK_CFC71007D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE sous_menu ADD CONSTRAINT FK_F30864DFCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F792845664');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0D44F05E5');
        $this->addSql('ALTER TABLE chefs DROP FOREIGN KEY FK_5295C000D44F05E5');
        $this->addSql('ALTER TABLE food DROP FOREIGN KEY FK_D43829F7D44F05E5');
        $this->addSql('ALTER TABLE slider DROP FOREIGN KEY FK_CFC71007D44F05E5');
        $this->addSql('ALTER TABLE sous_menu DROP FOREIGN KEY FK_F30864DFCCD7E912');
        $this->addSql('DROP TABLE about');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE categories_food');
        $this->addSql('DROP TABLE chefs');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE features');
        $this->addSql('DROP TABLE food');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE slider');
        $this->addSql('DROP TABLE sous_menu');
    }
}
