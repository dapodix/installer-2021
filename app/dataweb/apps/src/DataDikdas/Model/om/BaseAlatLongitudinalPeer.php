<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AlatLongitudinal;
use DataDikdas\Model\AlatLongitudinalPeer;
use DataDikdas\Model\AlatPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\map\AlatLongitudinalTableMap;

/**
 * Base static class for performing query and update operations on the 'alat_longitudinal' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseAlatLongitudinalPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'alat_longitudinal';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\AlatLongitudinal';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AlatLongitudinalTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the id_alat field */
    const ID_ALAT = 'alat_longitudinal.id_alat';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'alat_longitudinal.semester_id';

    /** the column name for the jumlah field */
    const JUMLAH = 'alat_longitudinal.jumlah';

    /** the column name for the status_kelaikan field */
    const STATUS_KELAIKAN = 'alat_longitudinal.status_kelaikan';

    /** the column name for the create_date field */
    const CREATE_DATE = 'alat_longitudinal.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'alat_longitudinal.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'alat_longitudinal.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'alat_longitudinal.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'alat_longitudinal.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of AlatLongitudinal objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array AlatLongitudinal[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AlatLongitudinalPeer::$fieldNames[AlatLongitudinalPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdAlat', 'SemesterId', 'Jumlah', 'StatusKelaikan', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAlat', 'semesterId', 'jumlah', 'statusKelaikan', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (AlatLongitudinalPeer::ID_ALAT, AlatLongitudinalPeer::SEMESTER_ID, AlatLongitudinalPeer::JUMLAH, AlatLongitudinalPeer::STATUS_KELAIKAN, AlatLongitudinalPeer::CREATE_DATE, AlatLongitudinalPeer::LAST_UPDATE, AlatLongitudinalPeer::SOFT_DELETE, AlatLongitudinalPeer::LAST_SYNC, AlatLongitudinalPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ALAT', 'SEMESTER_ID', 'JUMLAH', 'STATUS_KELAIKAN', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_alat', 'semester_id', 'jumlah', 'status_kelaikan', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AlatLongitudinalPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdAlat' => 0, 'SemesterId' => 1, 'Jumlah' => 2, 'StatusKelaikan' => 3, 'CreateDate' => 4, 'LastUpdate' => 5, 'SoftDelete' => 6, 'LastSync' => 7, 'UpdaterId' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAlat' => 0, 'semesterId' => 1, 'jumlah' => 2, 'statusKelaikan' => 3, 'createDate' => 4, 'lastUpdate' => 5, 'softDelete' => 6, 'lastSync' => 7, 'updaterId' => 8, ),
        BasePeer::TYPE_COLNAME => array (AlatLongitudinalPeer::ID_ALAT => 0, AlatLongitudinalPeer::SEMESTER_ID => 1, AlatLongitudinalPeer::JUMLAH => 2, AlatLongitudinalPeer::STATUS_KELAIKAN => 3, AlatLongitudinalPeer::CREATE_DATE => 4, AlatLongitudinalPeer::LAST_UPDATE => 5, AlatLongitudinalPeer::SOFT_DELETE => 6, AlatLongitudinalPeer::LAST_SYNC => 7, AlatLongitudinalPeer::UPDATER_ID => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ALAT' => 0, 'SEMESTER_ID' => 1, 'JUMLAH' => 2, 'STATUS_KELAIKAN' => 3, 'CREATE_DATE' => 4, 'LAST_UPDATE' => 5, 'SOFT_DELETE' => 6, 'LAST_SYNC' => 7, 'UPDATER_ID' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('id_alat' => 0, 'semester_id' => 1, 'jumlah' => 2, 'status_kelaikan' => 3, 'create_date' => 4, 'last_update' => 5, 'soft_delete' => 6, 'last_sync' => 7, 'updater_id' => 8, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $toNames = AlatLongitudinalPeer::getFieldNames($toType);
        $key = isset(AlatLongitudinalPeer::$fieldKeys[$fromType][$name]) ? AlatLongitudinalPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AlatLongitudinalPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AlatLongitudinalPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AlatLongitudinalPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AlatLongitudinalPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AlatLongitudinalPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AlatLongitudinalPeer::ID_ALAT);
            $criteria->addSelectColumn(AlatLongitudinalPeer::SEMESTER_ID);
            $criteria->addSelectColumn(AlatLongitudinalPeer::JUMLAH);
            $criteria->addSelectColumn(AlatLongitudinalPeer::STATUS_KELAIKAN);
            $criteria->addSelectColumn(AlatLongitudinalPeer::CREATE_DATE);
            $criteria->addSelectColumn(AlatLongitudinalPeer::LAST_UPDATE);
            $criteria->addSelectColumn(AlatLongitudinalPeer::SOFT_DELETE);
            $criteria->addSelectColumn(AlatLongitudinalPeer::LAST_SYNC);
            $criteria->addSelectColumn(AlatLongitudinalPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_alat');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.jumlah');
            $criteria->addSelectColumn($alias . '.status_kelaikan');
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
        $criteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AlatLongitudinal
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AlatLongitudinalPeer::doSelect($critcopy, $con);
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
        return AlatLongitudinalPeer::populateObjects(AlatLongitudinalPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AlatLongitudinalPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

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
     * @param      AlatLongitudinal $obj A AlatLongitudinal object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getIdAlat(), (string) $obj->getSemesterId()));
            } // if key === null
            AlatLongitudinalPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A AlatLongitudinal object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof AlatLongitudinal) {
                $key = serialize(array((string) $value->getIdAlat(), (string) $value->getSemesterId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AlatLongitudinal object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AlatLongitudinalPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   AlatLongitudinal Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AlatLongitudinalPeer::$instances[$key])) {
                return AlatLongitudinalPeer::$instances[$key];
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
        foreach (AlatLongitudinalPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AlatLongitudinalPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to alat_longitudinal
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
        $cls = AlatLongitudinalPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AlatLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AlatLongitudinalPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AlatLongitudinalPeer::addInstanceToPool($obj, $key);
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
     * @return array (AlatLongitudinal object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AlatLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AlatLongitudinalPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AlatLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AlatLongitudinalPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AlatLongitudinalPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Alat table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAlat(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatLongitudinalPeer::ID_ALAT, AlatPeer::ID_ALAT, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Selects a collection of AlatLongitudinal objects pre-filled with their Alat objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AlatLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAlat(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);
        }

        AlatLongitudinalPeer::addSelectColumns($criteria);
        $startcol = AlatLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        AlatPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatLongitudinalPeer::ID_ALAT, AlatPeer::ID_ALAT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AlatPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AlatPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AlatPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AlatPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (AlatLongitudinal) to $obj2 (Alat)
                $obj2->addAlatLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AlatLongitudinal objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AlatLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);
        }

        AlatLongitudinalPeer::addSelectColumns($criteria);
        $startcol = AlatLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (AlatLongitudinal) to $obj2 (Semester)
                $obj2->addAlatLongitudinal($obj1);

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
        $criteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatLongitudinalPeer::ID_ALAT, AlatPeer::ID_ALAT, $join_behavior);

        $criteria->addJoin(AlatLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Selects a collection of AlatLongitudinal objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AlatLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);
        }

        AlatLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = AlatLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        AlatPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + AlatPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatLongitudinalPeer::ID_ALAT, AlatPeer::ID_ALAT, $join_behavior);

        $criteria->addJoin(AlatLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Alat rows

            $key2 = AlatPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = AlatPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AlatPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    AlatPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (AlatLongitudinal) to the collection in $obj2 (Alat)
                $obj2->addAlatLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined Semester rows

            $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SemesterPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (AlatLongitudinal) to the collection in $obj3 (Semester)
                $obj3->addAlatLongitudinal($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Alat table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAlat(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatLongitudinalPeer::ID_ALAT, AlatPeer::ID_ALAT, $join_behavior);

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
     * Selects a collection of AlatLongitudinal objects pre-filled with all related objects except Alat.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AlatLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAlat(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);
        }

        AlatLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = AlatLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Semester rows

                $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SemesterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (AlatLongitudinal) to the collection in $obj2 (Semester)
                $obj2->addAlatLongitudinal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AlatLongitudinal objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AlatLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);
        }

        AlatLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = AlatLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        AlatPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + AlatPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatLongitudinalPeer::ID_ALAT, AlatPeer::ID_ALAT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Alat rows

                $key2 = AlatPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = AlatPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = AlatPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    AlatPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (AlatLongitudinal) to the collection in $obj2 (Alat)
                $obj2->addAlatLongitudinal($obj1);

            } // if joined row is not null

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
        return Propel::getDatabaseMap(AlatLongitudinalPeer::DATABASE_NAME)->getTable(AlatLongitudinalPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAlatLongitudinalPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAlatLongitudinalPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AlatLongitudinalTableMap());
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
        return AlatLongitudinalPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a AlatLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or AlatLongitudinal object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from AlatLongitudinal object
        }


        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a AlatLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or AlatLongitudinal object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AlatLongitudinalPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AlatLongitudinalPeer::ID_ALAT);
            $value = $criteria->remove(AlatLongitudinalPeer::ID_ALAT);
            if ($value) {
                $selectCriteria->add(AlatLongitudinalPeer::ID_ALAT, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(AlatLongitudinalPeer::SEMESTER_ID);
            $value = $criteria->remove(AlatLongitudinalPeer::SEMESTER_ID);
            if ($value) {
                $selectCriteria->add(AlatLongitudinalPeer::SEMESTER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AlatLongitudinalPeer::TABLE_NAME);
            }

        } else { // $values is AlatLongitudinal object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the alat_longitudinal table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AlatLongitudinalPeer::TABLE_NAME, $con, AlatLongitudinalPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AlatLongitudinalPeer::clearInstancePool();
            AlatLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a AlatLongitudinal or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or AlatLongitudinal object or primary key or array of primary keys
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
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AlatLongitudinalPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof AlatLongitudinal) { // it's a model object
            // invalidate the cache for this single object
            AlatLongitudinalPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AlatLongitudinalPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(AlatLongitudinalPeer::ID_ALAT, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(AlatLongitudinalPeer::SEMESTER_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                AlatLongitudinalPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AlatLongitudinalPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            AlatLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given AlatLongitudinal object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      AlatLongitudinal $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AlatLongitudinalPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AlatLongitudinalPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AlatLongitudinalPeer::DATABASE_NAME, AlatLongitudinalPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $id_alat
     * @param   string $semester_id
     * @param      PropelPDO $con
     * @return   AlatLongitudinal
     */
    public static function retrieveByPK($id_alat, $semester_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $id_alat, (string) $semester_id));
         if (null !== ($obj = AlatLongitudinalPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AlatLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(AlatLongitudinalPeer::DATABASE_NAME);
        $criteria->add(AlatLongitudinalPeer::ID_ALAT, $id_alat);
        $criteria->add(AlatLongitudinalPeer::SEMESTER_ID, $semester_id);
        $v = AlatLongitudinalPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseAlatLongitudinalPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAlatLongitudinalPeer::buildTableMap();

