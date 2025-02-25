<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\ErrortypePeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\VldPtk;
use DataDikdas\Model\VldPtkPeer;
use DataDikdas\Model\map\VldPtkTableMap;

/**
 * Base static class for performing query and update operations on the 'vld_ptk' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseVldPtkPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'vld_ptk';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\VldPtk';

    /** the related TableMap class for this table */
    const TM_CLASS = 'VldPtkTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the logid field */
    const LOGID = 'vld_ptk.logid';

    /** the column name for the ptk_id field */
    const PTK_ID = 'vld_ptk.ptk_id';

    /** the column name for the idtype field */
    const IDTYPE = 'vld_ptk.idtype';

    /** the column name for the status_validasi field */
    const STATUS_VALIDASI = 'vld_ptk.status_validasi';

    /** the column name for the field_error field */
    const FIELD_ERROR = 'vld_ptk.field_error';

    /** the column name for the error_message field */
    const ERROR_MESSAGE = 'vld_ptk.error_message';

    /** the column name for the app_username field */
    const APP_USERNAME = 'vld_ptk.app_username';

    /** the column name for the create_date field */
    const CREATE_DATE = 'vld_ptk.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'vld_ptk.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'vld_ptk.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'vld_ptk.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'vld_ptk.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of VldPtk objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array VldPtk[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. VldPtkPeer::$fieldNames[VldPtkPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Logid', 'PtkId', 'Idtype', 'StatusValidasi', 'FieldError', 'ErrorMessage', 'AppUsername', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('logid', 'ptkId', 'idtype', 'statusValidasi', 'fieldError', 'errorMessage', 'appUsername', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (VldPtkPeer::LOGID, VldPtkPeer::PTK_ID, VldPtkPeer::IDTYPE, VldPtkPeer::STATUS_VALIDASI, VldPtkPeer::FIELD_ERROR, VldPtkPeer::ERROR_MESSAGE, VldPtkPeer::APP_USERNAME, VldPtkPeer::CREATE_DATE, VldPtkPeer::LAST_UPDATE, VldPtkPeer::SOFT_DELETE, VldPtkPeer::LAST_SYNC, VldPtkPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LOGID', 'PTK_ID', 'IDTYPE', 'STATUS_VALIDASI', 'FIELD_ERROR', 'ERROR_MESSAGE', 'APP_USERNAME', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('logid', 'ptk_id', 'idtype', 'status_validasi', 'field_error', 'error_message', 'app_username', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. VldPtkPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Logid' => 0, 'PtkId' => 1, 'Idtype' => 2, 'StatusValidasi' => 3, 'FieldError' => 4, 'ErrorMessage' => 5, 'AppUsername' => 6, 'CreateDate' => 7, 'LastUpdate' => 8, 'SoftDelete' => 9, 'LastSync' => 10, 'UpdaterId' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('logid' => 0, 'ptkId' => 1, 'idtype' => 2, 'statusValidasi' => 3, 'fieldError' => 4, 'errorMessage' => 5, 'appUsername' => 6, 'createDate' => 7, 'lastUpdate' => 8, 'softDelete' => 9, 'lastSync' => 10, 'updaterId' => 11, ),
        BasePeer::TYPE_COLNAME => array (VldPtkPeer::LOGID => 0, VldPtkPeer::PTK_ID => 1, VldPtkPeer::IDTYPE => 2, VldPtkPeer::STATUS_VALIDASI => 3, VldPtkPeer::FIELD_ERROR => 4, VldPtkPeer::ERROR_MESSAGE => 5, VldPtkPeer::APP_USERNAME => 6, VldPtkPeer::CREATE_DATE => 7, VldPtkPeer::LAST_UPDATE => 8, VldPtkPeer::SOFT_DELETE => 9, VldPtkPeer::LAST_SYNC => 10, VldPtkPeer::UPDATER_ID => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LOGID' => 0, 'PTK_ID' => 1, 'IDTYPE' => 2, 'STATUS_VALIDASI' => 3, 'FIELD_ERROR' => 4, 'ERROR_MESSAGE' => 5, 'APP_USERNAME' => 6, 'CREATE_DATE' => 7, 'LAST_UPDATE' => 8, 'SOFT_DELETE' => 9, 'LAST_SYNC' => 10, 'UPDATER_ID' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('logid' => 0, 'ptk_id' => 1, 'idtype' => 2, 'status_validasi' => 3, 'field_error' => 4, 'error_message' => 5, 'app_username' => 6, 'create_date' => 7, 'last_update' => 8, 'soft_delete' => 9, 'last_sync' => 10, 'updater_id' => 11, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $toNames = VldPtkPeer::getFieldNames($toType);
        $key = isset(VldPtkPeer::$fieldKeys[$fromType][$name]) ? VldPtkPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(VldPtkPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, VldPtkPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return VldPtkPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. VldPtkPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(VldPtkPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(VldPtkPeer::LOGID);
            $criteria->addSelectColumn(VldPtkPeer::PTK_ID);
            $criteria->addSelectColumn(VldPtkPeer::IDTYPE);
            $criteria->addSelectColumn(VldPtkPeer::STATUS_VALIDASI);
            $criteria->addSelectColumn(VldPtkPeer::FIELD_ERROR);
            $criteria->addSelectColumn(VldPtkPeer::ERROR_MESSAGE);
            $criteria->addSelectColumn(VldPtkPeer::APP_USERNAME);
            $criteria->addSelectColumn(VldPtkPeer::CREATE_DATE);
            $criteria->addSelectColumn(VldPtkPeer::LAST_UPDATE);
            $criteria->addSelectColumn(VldPtkPeer::SOFT_DELETE);
            $criteria->addSelectColumn(VldPtkPeer::LAST_SYNC);
            $criteria->addSelectColumn(VldPtkPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.logid');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.idtype');
            $criteria->addSelectColumn($alias . '.status_validasi');
            $criteria->addSelectColumn($alias . '.field_error');
            $criteria->addSelectColumn($alias . '.error_message');
            $criteria->addSelectColumn($alias . '.app_username');
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
        $criteria->setPrimaryTableName(VldPtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 VldPtk
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = VldPtkPeer::doSelect($critcopy, $con);
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
        return VldPtkPeer::populateObjects(VldPtkPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            VldPtkPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

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
     * @param      VldPtk $obj A VldPtk object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getLogid();
            } // if key === null
            VldPtkPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A VldPtk object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof VldPtk) {
                $key = (string) $value->getLogid();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or VldPtk object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(VldPtkPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   VldPtk Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(VldPtkPeer::$instances[$key])) {
                return VldPtkPeer::$instances[$key];
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
        foreach (VldPtkPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        VldPtkPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to vld_ptk
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
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
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

        return (string) $row[$startcol];
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
        $cls = VldPtkPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = VldPtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = VldPtkPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VldPtkPeer::addInstanceToPool($obj, $key);
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
     * @return array (VldPtk object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = VldPtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = VldPtkPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + VldPtkPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VldPtkPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            VldPtkPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Errortype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinErrortype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(VldPtkPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(VldPtkPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of VldPtk objects pre-filled with their Errortype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinErrortype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkPeer::DATABASE_NAME);
        }

        VldPtkPeer::addSelectColumns($criteria);
        $startcol = VldPtkPeer::NUM_HYDRATE_COLUMNS;
        ErrortypePeer::addSelectColumns($criteria);

        $criteria->addJoin(VldPtkPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = VldPtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ErrortypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ErrortypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ErrortypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ErrortypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (VldPtk) to $obj2 (Errortype)
                $obj2->addVldPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of VldPtk objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkPeer::DATABASE_NAME);
        }

        VldPtkPeer::addSelectColumns($criteria);
        $startcol = VldPtkPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(VldPtkPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = VldPtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (VldPtk) to $obj2 (Ptk)
                $obj2->addVldPtk($obj1);

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
        $criteria->setPrimaryTableName(VldPtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(VldPtkPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

        $criteria->addJoin(VldPtkPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of VldPtk objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkPeer::DATABASE_NAME);
        }

        VldPtkPeer::addSelectColumns($criteria);
        $startcol2 = VldPtkPeer::NUM_HYDRATE_COLUMNS;

        ErrortypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ErrortypePeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(VldPtkPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

        $criteria->addJoin(VldPtkPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = VldPtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Errortype rows

            $key2 = ErrortypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ErrortypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ErrortypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ErrortypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (VldPtk) to the collection in $obj2 (Errortype)
                $obj2->addVldPtk($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key3 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PtkPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (VldPtk) to the collection in $obj3 (Ptk)
                $obj3->addVldPtk($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Errortype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptErrortype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(VldPtkPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(VldPtkPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

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
     * Selects a collection of VldPtk objects pre-filled with all related objects except Errortype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptErrortype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkPeer::DATABASE_NAME);
        }

        VldPtkPeer::addSelectColumns($criteria);
        $startcol2 = VldPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(VldPtkPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = VldPtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (VldPtk) to the collection in $obj2 (Ptk)
                $obj2->addVldPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of VldPtk objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkPeer::DATABASE_NAME);
        }

        VldPtkPeer::addSelectColumns($criteria);
        $startcol2 = VldPtkPeer::NUM_HYDRATE_COLUMNS;

        ErrortypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ErrortypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(VldPtkPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = VldPtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Errortype rows

                $key2 = ErrortypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ErrortypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = ErrortypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ErrortypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (VldPtk) to the collection in $obj2 (Errortype)
                $obj2->addVldPtk($obj1);

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
        return Propel::getDatabaseMap(VldPtkPeer::DATABASE_NAME)->getTable(VldPtkPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseVldPtkPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseVldPtkPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new VldPtkTableMap());
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
        return VldPtkPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a VldPtk or Criteria object.
     *
     * @param      mixed $values Criteria or VldPtk object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from VldPtk object
        }


        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a VldPtk or Criteria object.
     *
     * @param      mixed $values Criteria or VldPtk object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(VldPtkPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(VldPtkPeer::LOGID);
            $value = $criteria->remove(VldPtkPeer::LOGID);
            if ($value) {
                $selectCriteria->add(VldPtkPeer::LOGID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(VldPtkPeer::TABLE_NAME);
            }

        } else { // $values is VldPtk object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the vld_ptk table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(VldPtkPeer::TABLE_NAME, $con, VldPtkPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VldPtkPeer::clearInstancePool();
            VldPtkPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a VldPtk or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or VldPtk object or primary key or array of primary keys
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
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            VldPtkPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof VldPtk) { // it's a model object
            // invalidate the cache for this single object
            VldPtkPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VldPtkPeer::DATABASE_NAME);
            $criteria->add(VldPtkPeer::LOGID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                VldPtkPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(VldPtkPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            VldPtkPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given VldPtk object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      VldPtk $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(VldPtkPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(VldPtkPeer::TABLE_NAME);

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

        return BasePeer::doValidate(VldPtkPeer::DATABASE_NAME, VldPtkPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return VldPtk
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = VldPtkPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(VldPtkPeer::DATABASE_NAME);
        $criteria->add(VldPtkPeer::LOGID, $pk);

        $v = VldPtkPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return VldPtk[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(VldPtkPeer::DATABASE_NAME);
            $criteria->add(VldPtkPeer::LOGID, $pks, Criteria::IN);
            $objs = VldPtkPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseVldPtkPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseVldPtkPeer::buildTableMap();

