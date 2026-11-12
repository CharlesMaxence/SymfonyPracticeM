<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261112144511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE slide (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, position INT NOT NULL, image_id INT DEFAULT NULL, slide_show_id INT NOT NULL, INDEX IDX_72EFEE623DA5256D (image_id), INDEX IDX_72EFEE621D87D6D (slide_show_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE slide_show (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, image_id INT DEFAULT NULL, theme_id INT NOT NULL, UNIQUE INDEX UNIQ_5CE37D559027487 (theme_id), INDEX IDX_5CE37D53DA5256D (image_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE slide ADD CONSTRAINT FK_72EFEE623DA5256D FOREIGN KEY (image_id) REFERENCES tbl_image (id)');
        $this->addSql('ALTER TABLE slide ADD CONSTRAINT FK_72EFEE621D87D6D FOREIGN KEY (slide_show_id) REFERENCES slide_show (id)');
        $this->addSql('ALTER TABLE slide_show ADD CONSTRAINT FK_5CE37D53DA5256D FOREIGN KEY (image_id) REFERENCES tbl_image (id)');
        $this->addSql('ALTER TABLE slide_show ADD CONSTRAINT FK_5CE37D559027487 FOREIGN KEY (theme_id) REFERENCES tbl_theme (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE slide DROP FOREIGN KEY FK_72EFEE623DA5256D');
        $this->addSql('ALTER TABLE slide DROP FOREIGN KEY FK_72EFEE621D87D6D');
        $this->addSql('ALTER TABLE slide_show DROP FOREIGN KEY FK_5CE37D53DA5256D');
        $this->addSql('ALTER TABLE slide_show DROP FOREIGN KEY FK_5CE37D559027487');
        $this->addSql('DROP TABLE slide');
        $this->addSql('DROP TABLE slide_show');
    }
}
