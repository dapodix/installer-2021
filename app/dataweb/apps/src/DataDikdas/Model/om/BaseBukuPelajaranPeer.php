<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BukuPelajaran;
use DataDikdas\Model\BukuPelajaranPeer;
use DataDikdas\Model\PembelajaranPeer;
use DataDikdas\Model\map\BukuPelajaranTableMap;

/**
 * Base static class for performing query and update operations on the 'buku_pelajaran' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBukuPelajaranPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'buku_pelajaran';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\BukuPelajaran';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BukuPelajaranTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the id_biblio field */
    const ID_BIBLIO = 'buku_pelajaran.id_biblio';

    /** the column name for the pembelajaran_id field */
    const PEMBELAJARAN_ID = 'buku_pelajaran.pembelajaran_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'buku_pelajaran.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'buku_pelajaran.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'buku_pelajaran.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'buku_pelajaran.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'buku_pelajaran.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of BukuPelajaran objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array BukuPelajaran[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BukuPelajaranPeer::$fieldNames[BukuPelajaranPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdBiblio', 'PembelajaranId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBiblio', 'pembelajaranId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (BukuPelajaranPeer::ID_BIBLIO, BukuPelajaranPeer::PEMBELAJARAN_ID, BukuPelajaranPeer::CREATE_DATE, BukuPelajaranPeer::LAST_UPDATE, BukuPelajaranPeer::SOFT_DELETE, BukuPelajaranPeer::LAST_SYNC, BukuPelajaranPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BIBLIO', 'PEMBELAJARAN_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_biblio', 'pembelajaran_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BukuPelajaranPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdBiblio' => 0, 'PembelajaranId' => 1, 'CreateDate' => 2, 'LastUpdate' => 3, 'SoftDelete' => 4, 'LastSync' => 5, 'UpdaterId' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBiblio' => 0, 'pembelajaranId' => 1, 'createDate' => 2, 'lastUpdate' => 3, 'softDelete' => 4, 'lastSync' => 5, 'updaterId' => 6, ),
        BasePeer::TYPE_COLNAME => array (BukuPelajaranPeer::ID_BIBLIO => 0, BukuPelajaranPeer::PEMBELAJARAN_ID => 1, BukuPelajaranPeer::CREATE_DATE => 2, BukuPelajaranPeer::LAST_UPDATE => 3, BukuPelajaranPeer::SOFT_DELETE => 4, BukuPelajaranPeer::LAST_SYNC => 5, BukuPelajaranPeer::UPDATER_ID => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BIBLIO' => 0, 'PEMBELAJARAN_ID' => 1, 'CREATE_DATE' => 2, 'LAST_UPDATE' => 3, 'SOFT_DELETE' => 4, 'LAST_SYNC' => 5, 'UPDATER_ID' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('id_biblio' => 0, 'pembelajaran_id' => 1, 'create_date' => 2, 'last_update' => 3, 'soft_delete' => 4, 'last_sync' => 5, 'updater_id' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = BukuPelajaranPeer::getFieldNames($toType);
        $key = isset(BukuPelajaranPeer::$fieldKeys[$fromType][$name]) ? BukuPelajaranPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BukuPelajaranPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, BukuPelajaranPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BukuPelajaranPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. BukuPelajaranPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BukuPelajaranPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BukuPelajaranPeer::ID_BIBLIO);
            $criteria->addSelectColumn(BukuPelajaranPeer::PEMBELAJARAN_ID);
            $criteria->addSelectColumn(BukuPelajaranPeer::CREATE_DATE);
            $criteria->addSelectColumn(BukuPelajaranPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BukuPelajaranPeer::SOFT_DELETE);
            $criteria->addSelectColumn(BukuPelajaranPeer::LAST_SYNC);
            $criteria->addSelectColumn(BukuPelajaranPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_biblio');
            $criteria->addSelectColumn($alias . '.pembelajaran_id');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.soft_delete');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.updater_id');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 BukuPelajaran
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BukuPelajaranPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return BukuPelajaranPeer::populateObjects(BukuPelajaranPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BukuPelajaranPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      BukuPelajaran $obj A BukuPelajaran object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getIdBiblio(), (string) $obj->getPembelajaranId()));
            } // if key === null
            BukuPelajaranPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A BukuPelajaran object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof BukuPelajaran) {
                $key = serialize(array((string) $value->getIdBiblio(), (string) $value->getPembelajaranId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or BukuPelajaran object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BukuPelajaranPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   BukuPelajaran Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BukuPelajaranPeer::$instances[$key])) {
                return BukuPelajaranPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (BukuPelajaranPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BukuPelajaranPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to buku_pelajaran
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return array((string) $row[$startcol], (string) $row[$startcol + 1]);
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = BukuPelajaranPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BukuPelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BukuPelajaranPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BukuPelajaranPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (BukuPelajaran object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BukuPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BukuPelajaranPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BukuPelajaranPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BukuPelajaranPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BukuPelajaranPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Pembelajaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPelajaranPeer::PEMBELAJARAN_ID, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of BukuPelajaran objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BukuPelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);
        }

        BukuPelajaranPeer::addSelectColumns($criteria);
        $startcol = BukuPelajaranPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(BukuPelajaranPeer::PEMBELAJARAN_ID, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BukuPelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPelajaranPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (BukuPelajaran) to $obj2 (Pembelajaran)
                $obj2->addBukuPelajaran($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPelajaranPeer::PEMBELAJARAN_ID, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of BukuPelajaran objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BukuPelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);
        }

        BukuPelajaranPeer::addSelectColumns($criteria);
        $startcol2 = BukuPelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPelajaranPeer::PEMBELAJARAN_ID, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPelajaranPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Pembelajaran rows

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (BukuPelajaran) to the collection in $obj2 (Pembelajaran)
                $obj2->addBukuPelajaran($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(BukuPelajaranPeer::DATABASE_NAME)->getTable(BukuPelajaranPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBukuPelajaranPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBukuPelajaranPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BukuPelajaranTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return BukuPelajaranPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a BukuPelajaran or Criteria object.
     *
     * @param      mixed $values Criteria or BukuPelajaran object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from BukuPelajaran object
        }


        // Set the correct dbName
        $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a BukuPelajaran or Criteria object.
     *
     * @param      mixed $values Criteria or BukuPelajaran object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BukuPelajaranPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BukuPelajaranPeer::ID_BIBLIO);
            $value = $criteria->remove(BukuPelajaranPeer::ID_BIBLIO);
            if ($value) {
                $selectCriteria->add(BukuPelajaranPeer::ID_BIBLIO, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BukuPelajaranPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(BukuPelajaranPeer::PEMBELAJARAN_ID);
            $value = $criteria->remove(BukuPelajaranPeer::PEMBELAJARAN_ID);
            if ($value) {
                $selectCriteria->add(BukuPelajaranPeer::PEMBELAJARAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BukuPelajaranPeer::TABLE_NAME);
            }

        } else { // $values is BukuPelajaran object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the buku_pelajaran table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BukuPelajaranPeer::TABLE_NAME, $con, BukuPelajaranPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BukuPelajaranPeer::clearInstancePool();
            BukuPelajaranPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a BukuPelajaran or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or BukuPelajaran object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BukuPelajaranPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof BukuPelajaran) { // it's a model object
            // invalidate the cache for this single object
            BukuPelajaranPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BukuPelajaranPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(BukuPelajaranPeer::ID_BIBLIO, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(BukuPelajaranPeer::PEMBELAJARAN_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                BukuPelajaranPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BukuPelajaranPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BukuPelajaranPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given BukuPelajaran object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      BukuPelajaran $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BukuPelajaranPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BukuPelajaranPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(BukuPelajaranPeer::DATABASE_NAME, BukuPelajaranPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $id_biblio
     * @param   string $pembelajaran_id
     * @param      PropelPDO $con
     * @return   BukuPelajaran
     */
    public static function retrieveByPK($id_biblio, $pembelajaran_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $id_biblio, (string) $pembelajaran_id));
         if (null !== ($obj = BukuPelajaranPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BukuPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(BukuPelajaranPeer::DATABASE_NAME);
        $criteria->add(BukuPelajaranPeer::ID_BIBLIO, $id_biblio);
        $criteria->add(BukuPelajaranPeer::PEMBELAJARAN_ID, $pembelajaran_id);
        $v = BukuPelajaranPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseBukuPelajaranPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBukuPelajaranPeer::buildTableMap();

