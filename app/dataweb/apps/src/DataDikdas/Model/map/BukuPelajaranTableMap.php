<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'buku_pelajaran' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.DataDikdas.Model.map
 */
class BukuPelajaranTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BukuPelajaranTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('buku_pelajaran');
        $this->setPhpName('BukuPelajaran');
        $this->setClassname('DataDikdas\\Model\\BukuPelajaran');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_biblio', 'IdBiblio', 'VARCHAR', true, null, null);
        $this->addForeignPrimaryKey('pembelajaran_id', 'PembelajaranId', 'VARCHAR' , 'pembelajaran', 'pembelajaran_id', true, null, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('soft_delete', 'SoftDelete', 'DECIMAL', true, 65536, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Pembelajaran', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('pembelajaran_id' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // BukuPelajaranTableMap
