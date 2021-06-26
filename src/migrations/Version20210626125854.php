<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210626125854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors_table (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sec_name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE authors_table_book_table (authors_table_id INT NOT NULL, book_table_id INT NOT NULL, INDEX IDX_2FE452FB2CBA594B (authors_table_id), INDEX IDX_2FE452FBF5003E05 (book_table_id), PRIMARY KEY(authors_table_id, book_table_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_table (id INT AUTO_INCREMENT NOT NULL, publisher_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, copies_cnt INT NOT NULL, UNIQUE INDEX UNIQ_F8EB9A3F8AAA43D0 (publisher_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publisher (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, author_profit VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE authors_table_book_table ADD CONSTRAINT FK_2FE452FB2CBA594B FOREIGN KEY (authors_table_id) REFERENCES authors_table (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE authors_table_book_table ADD CONSTRAINT FK_2FE452FBF5003E05 FOREIGN KEY (book_table_id) REFERENCES book_table (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_table ADD CONSTRAINT FK_F8EB9A3F8AAA43D0 FOREIGN KEY (publisher_id_id) REFERENCES publisher (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authors_table_book_table DROP FOREIGN KEY FK_2FE452FB2CBA594B');
        $this->addSql('ALTER TABLE authors_table_book_table DROP FOREIGN KEY FK_2FE452FBF5003E05');
        $this->addSql('ALTER TABLE book_table DROP FOREIGN KEY FK_F8EB9A3F8AAA43D0');
        $this->addSql('DROP TABLE authors_table');
        $this->addSql('DROP TABLE authors_table_book_table');
        $this->addSql('DROP TABLE book_table');
        $this->addSql('DROP TABLE publisher');
    }
}
