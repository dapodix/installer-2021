<?php

namespace DataDikdas\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatQuery;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\AngkutanQuery;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisHapusBukuPeer;
use DataDikdas\Model\JenisHapusBukuQuery;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahQuery;

/**
 * Base class that represents a row from the 'ref.jenis_hapus_buku' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisHapusBuku extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenisHapusBukuPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenisHapusBukuPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_hapus_buku field.
     * @var        string
     */
    protected $id_hapus_buku;

    /**
     * The value for the ket_hapus_buku field.
     * @var        string
     */
    protected $ket_hapus_buku;

    /**
     * The value for the u_prasarana field.
     * @var        string
     */
    protected $u_prasarana;

    /**
     * The value for the u_sarana field.
     * @var        string
     */
    protected $u_sarana;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $last_update;

    /**
     * The value for the expired_date field.
     * @var        string
     */
    protected $expired_date;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * @var        PropelObjectCollection|Alat[] Collection to store aggregation of Alat objects.
     */
    protected $collAlats;
    protected $collAlatsPartial;

    /**
     * @var        PropelObjectCollection|Angkutan[] Collection to store aggregation of Angkutan objects.
     */
    protected $collAngkutans;
    protected $collAngkutansPartial;

    /**
     * @var        PropelObjectCollection|Bangunan[] Collection to store aggregation of Bangunan objects.
     */
    protected $collBangunans;
    protected $collBangunansPartial;

    /**
     * @var        PropelObjectCollection|Buku[] Collection to store aggregation of Buku objects.
     */
    protected $collBukus;
    protected $collBukusPartial;

    /**
     * @var        PropelObjectCollection|Tanah[] Collection to store aggregation of Tanah objects.
     */
    protected $collTanahs;
    protected $collTanahsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $angkutansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bangunansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bukusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJenisHapusBuku object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_hapus_buku] column value.
     * 
     * @return string
     */
    public function getIdHapusBuku()
    {
        return $this->id_hapus_buku;
    }

    /**
     * Get the [ket_hapus_buku] column value.
     * 
     * @return string
     */
    public function getKetHapusBuku()
    {
        return $this->ket_hapus_buku;
    }

    /**
     * Get the [u_prasarana] column value.
     * 
     * @return string
     */
    public function getUPrasarana()
    {
        return $this->u_prasarana;
    }

    /**
     * Get the [u_sarana] column value.
     * 
     * @return string
     */
    public function getUSarana()
    {
        return $this->u_sarana;
    }

    /**
     * Get the [optionally formatted] temporal [create_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateDate($format = 'Y-m-d H:i:s')
    {
        if ($this->create_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->create_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->create_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_update] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdate($format = 'Y-m-d H:i:s')
    {
        if ($this->last_update === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_update);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_update, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [expired_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpiredDate($format = 'Y-m-d H:i:s')
    {
        if ($this->expired_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->expired_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expired_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_sync] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastSync($format = 'Y-m-d H:i:s')
    {
        if ($this->last_sync === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_sync);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_sync, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Set the value of [id_hapus_buku] column.
     * 
     * @param string $v new value
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setIdHapusBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_hapus_buku !== $v) {
            $this->id_hapus_buku = $v;
            $this->modifiedColumns[] = JenisHapusBukuPeer::ID_HAPUS_BUKU;
        }


        return $this;
    } // setIdHapusBuku()

    /**
     * Set the value of [ket_hapus_buku] column.
     * 
     * @param string $v new value
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setKetHapusBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_hapus_buku !== $v) {
            $this->ket_hapus_buku = $v;
            $this->modifiedColumns[] = JenisHapusBukuPeer::KET_HAPUS_BUKU;
        }


        return $this;
    } // setKetHapusBuku()

    /**
     * Set the value of [u_prasarana] column.
     * 
     * @param string $v new value
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setUPrasarana($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->u_prasarana !== $v) {
            $this->u_prasarana = $v;
            $this->modifiedColumns[] = JenisHapusBukuPeer::U_PRASARANA;
        }


        return $this;
    } // setUPrasarana()

    /**
     * Set the value of [u_sarana] column.
     * 
     * @param string $v new value
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setUSarana($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->u_sarana !== $v) {
            $this->u_sarana = $v;
            $this->modifiedColumns[] = JenisHapusBukuPeer::U_SARANA;
        }


        return $this;
    } // setUSarana()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenisHapusBukuPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenisHapusBukuPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenisHapusBukuPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->last_sync !== null && $tmpDt = new DateTime($this->last_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '1901-01-01 00:00:00') // or the entered value matches the default
                 ) {
                $this->last_sync = $newDateAsString;
                $this->modifiedColumns[] = JenisHapusBukuPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->last_sync !== '1901-01-01 00:00:00') {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_hapus_buku = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->ket_hapus_buku = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->u_prasarana = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->u_sarana = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->create_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_update = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->expired_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_sync = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenisHapusBuku object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(JenisHapusBukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenisHapusBukuPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAlats = null;

            $this->collAngkutans = null;

            $this->collBangunans = null;

            $this->collBukus = null;

            $this->collTanahs = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(JenisHapusBukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenisHapusBukuQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(JenisHapusBukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                JenisHapusBukuPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->alatsScheduledForDeletion !== null) {
                if (!$this->alatsScheduledForDeletion->isEmpty()) {
                    foreach ($this->alatsScheduledForDeletion as $alat) {
                        // need to save related object because we set the relation to null
                        $alat->save($con);
                    }
                    $this->alatsScheduledForDeletion = null;
                }
            }

            if ($this->collAlats !== null) {
                foreach ($this->collAlats as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->angkutansScheduledForDeletion !== null) {
                if (!$this->angkutansScheduledForDeletion->isEmpty()) {
                    foreach ($this->angkutansScheduledForDeletion as $angkutan) {
                        // need to save related object because we set the relation to null
                        $angkutan->save($con);
                    }
                    $this->angkutansScheduledForDeletion = null;
                }
            }

            if ($this->collAngkutans !== null) {
                foreach ($this->collAngkutans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bangunansScheduledForDeletion !== null) {
                if (!$this->bangunansScheduledForDeletion->isEmpty()) {
                    foreach ($this->bangunansScheduledForDeletion as $bangunan) {
                        // need to save related object because we set the relation to null
                        $bangunan->save($con);
                    }
                    $this->bangunansScheduledForDeletion = null;
                }
            }

            if ($this->collBangunans !== null) {
                foreach ($this->collBangunans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bukusScheduledForDeletion !== null) {
                if (!$this->bukusScheduledForDeletion->isEmpty()) {
                    foreach ($this->bukusScheduledForDeletion as $buku) {
                        // need to save related object because we set the relation to null
                        $buku->save($con);
                    }
                    $this->bukusScheduledForDeletion = null;
                }
            }

            if ($this->collBukus !== null) {
                foreach ($this->collBukus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tanahsScheduledForDeletion !== null) {
                if (!$this->tanahsScheduledForDeletion->isEmpty()) {
                    foreach ($this->tanahsScheduledForDeletion as $tanah) {
                        // need to save related object because we set the relation to null
                        $tanah->save($con);
                    }
                    $this->tanahsScheduledForDeletion = null;
                }
            }

            if ($this->collTanahs !== null) {
                foreach ($this->collTanahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(JenisHapusBukuPeer::ID_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"id_hapus_buku"';
        }
        if ($this->isColumnModified(JenisHapusBukuPeer::KET_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"ket_hapus_buku"';
        }
        if ($this->isColumnModified(JenisHapusBukuPeer::U_PRASARANA)) {
            $modifiedColumns[':p' . $index++]  = '"u_prasarana"';
        }
        if ($this->isColumnModified(JenisHapusBukuPeer::U_SARANA)) {
            $modifiedColumns[':p' . $index++]  = '"u_sarana"';
        }
        if ($this->isColumnModified(JenisHapusBukuPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenisHapusBukuPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenisHapusBukuPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenisHapusBukuPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenis_hapus_buku" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_hapus_buku"':						
                        $stmt->bindValue($identifier, $this->id_hapus_buku, PDO::PARAM_STR);
                        break;
                    case '"ket_hapus_buku"':						
                        $stmt->bindValue($identifier, $this->ket_hapus_buku, PDO::PARAM_STR);
                        break;
                    case '"u_prasarana"':						
                        $stmt->bindValue($identifier, $this->u_prasarana, PDO::PARAM_STR);
                        break;
                    case '"u_sarana"':						
                        $stmt->bindValue($identifier, $this->u_sarana, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = JenisHapusBukuPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlats !== null) {
                    foreach ($this->collAlats as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAngkutans !== null) {
                    foreach ($this->collAngkutans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBangunans !== null) {
                    foreach ($this->collBangunans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBukus !== null) {
                    foreach ($this->collBukus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTanahs !== null) {
                    foreach ($this->collTanahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_FIELDNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = JenisHapusBukuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdHapusBuku();
                break;
            case 1:
                return $this->getKetHapusBuku();
                break;
            case 2:
                return $this->getUPrasarana();
                break;
            case 3:
                return $this->getUSarana();
                break;
            case 4:
                return $this->getCreateDate();
                break;
            case 5:
                return $this->getLastUpdate();
                break;
            case 6:
                return $this->getExpiredDate();
                break;
            case 7:
                return $this->getLastSync();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['JenisHapusBuku'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenisHapusBuku'][$this->getPrimaryKey()] = true;
        $keys = JenisHapusBukuPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdHapusBuku(),
            $keys[1] => $this->getKetHapusBuku(),
            $keys[2] => $this->getUPrasarana(),
            $keys[3] => $this->getUSarana(),
            $keys[4] => $this->getCreateDate(),
            $keys[5] => $this->getLastUpdate(),
            $keys[6] => $this->getExpiredDate(),
            $keys[7] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collAlats) {
                $result['Alats'] = $this->collAlats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAngkutans) {
                $result['Angkutans'] = $this->collAngkutans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBangunans) {
                $result['Bangunans'] = $this->collBangunans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBukus) {
                $result['Bukus'] = $this->collBukus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTanahs) {
                $result['Tanahs'] = $this->collTanahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_FIELDNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = JenisHapusBukuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdHapusBuku($value);
                break;
            case 1:
                $this->setKetHapusBuku($value);
                break;
            case 2:
                $this->setUPrasarana($value);
                break;
            case 3:
                $this->setUSarana($value);
                break;
            case 4:
                $this->setCreateDate($value);
                break;
            case 5:
                $this->setLastUpdate($value);
                break;
            case 6:
                $this->setExpiredDate($value);
                break;
            case 7:
                $this->setLastSync($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_FIELDNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = JenisHapusBukuPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdHapusBuku($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKetHapusBuku($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUPrasarana($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUSarana($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCreateDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastUpdate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setExpiredDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastSync($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JenisHapusBukuPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenisHapusBukuPeer::ID_HAPUS_BUKU)) $criteria->add(JenisHapusBukuPeer::ID_HAPUS_BUKU, $this->id_hapus_buku);
        if ($this->isColumnModified(JenisHapusBukuPeer::KET_HAPUS_BUKU)) $criteria->add(JenisHapusBukuPeer::KET_HAPUS_BUKU, $this->ket_hapus_buku);
        if ($this->isColumnModified(JenisHapusBukuPeer::U_PRASARANA)) $criteria->add(JenisHapusBukuPeer::U_PRASARANA, $this->u_prasarana);
        if ($this->isColumnModified(JenisHapusBukuPeer::U_SARANA)) $criteria->add(JenisHapusBukuPeer::U_SARANA, $this->u_sarana);
        if ($this->isColumnModified(JenisHapusBukuPeer::CREATE_DATE)) $criteria->add(JenisHapusBukuPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenisHapusBukuPeer::LAST_UPDATE)) $criteria->add(JenisHapusBukuPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenisHapusBukuPeer::EXPIRED_DATE)) $criteria->add(JenisHapusBukuPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenisHapusBukuPeer::LAST_SYNC)) $criteria->add(JenisHapusBukuPeer::LAST_SYNC, $this->last_sync);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(JenisHapusBukuPeer::DATABASE_NAME);
        $criteria->add(JenisHapusBukuPeer::ID_HAPUS_BUKU, $this->id_hapus_buku);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdHapusBuku();
    }

    /**
     * Generic method to set the primary key (id_hapus_buku column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdHapusBuku($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdHapusBuku();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenisHapusBuku (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKetHapusBuku($this->getKetHapusBuku());
        $copyObj->setUPrasarana($this->getUPrasarana());
        $copyObj->setUSarana($this->getUSarana());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setLastSync($this->getLastSync());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAlats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAngkutans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAngkutan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBangunans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBukus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBuku($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTanahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanah($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdHapusBuku(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return JenisHapusBuku Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return JenisHapusBukuPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenisHapusBukuPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Alat' == $relationName) {
            $this->initAlats();
        }
        if ('Angkutan' == $relationName) {
            $this->initAngkutans();
        }
        if ('Bangunan' == $relationName) {
            $this->initBangunans();
        }
        if ('Buku' == $relationName) {
            $this->initBukus();
        }
        if ('Tanah' == $relationName) {
            $this->initTanahs();
        }
    }

    /**
     * Clears out the collAlats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisHapusBuku The current object (for fluent API support)
     * @see        addAlats()
     */
    public function clearAlats()
    {
        $this->collAlats = null; // important to set this to null since that means it is uninitialized
        $this->collAlatsPartial = null;

        return $this;
    }

    /**
     * reset is the collAlats collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlats($v = true)
    {
        $this->collAlatsPartial = $v;
    }

    /**
     * Initializes the collAlats collection.
     *
     * By default this just sets the collAlats collection to an empty array (like clearcollAlats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlats($overrideExisting = true)
    {
        if (null !== $this->collAlats && !$overrideExisting) {
            return;
        }
        $this->collAlats = new PropelObjectCollection();
        $this->collAlats->setModel('Alat');
    }

    /**
     * Gets an array of Alat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisHapusBuku is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alat[] List of Alat objects
     * @throws PropelException
     */
    public function getAlats($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlatsPartial && !$this->isNew();
        if (null === $this->collAlats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlats) {
                // return empty collection
                $this->initAlats();
            } else {
                $collAlats = AlatQuery::create(null, $criteria)
                    ->filterByJenisHapusBuku($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlatsPartial && count($collAlats)) {
                      $this->initAlats(false);

                      foreach($collAlats as $obj) {
                        if (false == $this->collAlats->contains($obj)) {
                          $this->collAlats->append($obj);
                        }
                      }

                      $this->collAlatsPartial = true;
                    }

                    $collAlats->getInternalIterator()->rewind();
                    return $collAlats;
                }

                if($partial && $this->collAlats) {
                    foreach($this->collAlats as $obj) {
                        if($obj->isNew()) {
                            $collAlats[] = $obj;
                        }
                    }
                }

                $this->collAlats = $collAlats;
                $this->collAlatsPartial = false;
            }
        }

        return $this->collAlats;
    }

    /**
     * Sets a collection of Alat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alats A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setAlats(PropelCollection $alats, PropelPDO $con = null)
    {
        $alatsToDelete = $this->getAlats(new Criteria(), $con)->diff($alats);

        $this->alatsScheduledForDeletion = unserialize(serialize($alatsToDelete));

        foreach ($alatsToDelete as $alatRemoved) {
            $alatRemoved->setJenisHapusBuku(null);
        }

        $this->collAlats = null;
        foreach ($alats as $alat) {
            $this->addAlat($alat);
        }

        $this->collAlats = $alats;
        $this->collAlatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Alat objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Alat objects.
     * @throws PropelException
     */
    public function countAlats(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlatsPartial && !$this->isNew();
        if (null === $this->collAlats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlats) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlats());
            }
            $query = AlatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisHapusBuku($this)
                ->count($con);
        }

        return count($this->collAlats);
    }

    /**
     * Method called to associate a Alat object to this object
     * through the Alat foreign key attribute.
     *
     * @param    Alat $l Alat
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function addAlat(Alat $l)
    {
        if ($this->collAlats === null) {
            $this->initAlats();
            $this->collAlatsPartial = true;
        }
        if (!in_array($l, $this->collAlats->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlat($l);
        }

        return $this;
    }

    /**
     * @param	Alat $alat The alat object to add.
     */
    protected function doAddAlat($alat)
    {
        $this->collAlats[]= $alat;
        $alat->setJenisHapusBuku($this);
    }

    /**
     * @param	Alat $alat The alat object to remove.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function removeAlat($alat)
    {
        if ($this->getAlats()->contains($alat)) {
            $this->collAlats->remove($this->collAlats->search($alat));
            if (null === $this->alatsScheduledForDeletion) {
                $this->alatsScheduledForDeletion = clone $this->collAlats;
                $this->alatsScheduledForDeletion->clear();
            }
            $this->alatsScheduledForDeletion[]= $alat;
            $alat->setJenisHapusBuku(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinJenisSarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('JenisSarana', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAlats($query, $con);
    }

    /**
     * Clears out the collAngkutans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisHapusBuku The current object (for fluent API support)
     * @see        addAngkutans()
     */
    public function clearAngkutans()
    {
        $this->collAngkutans = null; // important to set this to null since that means it is uninitialized
        $this->collAngkutansPartial = null;

        return $this;
    }

    /**
     * reset is the collAngkutans collection loaded partially
     *
     * @return void
     */
    public function resetPartialAngkutans($v = true)
    {
        $this->collAngkutansPartial = $v;
    }

    /**
     * Initializes the collAngkutans collection.
     *
     * By default this just sets the collAngkutans collection to an empty array (like clearcollAngkutans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAngkutans($overrideExisting = true)
    {
        if (null !== $this->collAngkutans && !$overrideExisting) {
            return;
        }
        $this->collAngkutans = new PropelObjectCollection();
        $this->collAngkutans->setModel('Angkutan');
    }

    /**
     * Gets an array of Angkutan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisHapusBuku is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     * @throws PropelException
     */
    public function getAngkutans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAngkutansPartial && !$this->isNew();
        if (null === $this->collAngkutans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAngkutans) {
                // return empty collection
                $this->initAngkutans();
            } else {
                $collAngkutans = AngkutanQuery::create(null, $criteria)
                    ->filterByJenisHapusBuku($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAngkutansPartial && count($collAngkutans)) {
                      $this->initAngkutans(false);

                      foreach($collAngkutans as $obj) {
                        if (false == $this->collAngkutans->contains($obj)) {
                          $this->collAngkutans->append($obj);
                        }
                      }

                      $this->collAngkutansPartial = true;
                    }

                    $collAngkutans->getInternalIterator()->rewind();
                    return $collAngkutans;
                }

                if($partial && $this->collAngkutans) {
                    foreach($this->collAngkutans as $obj) {
                        if($obj->isNew()) {
                            $collAngkutans[] = $obj;
                        }
                    }
                }

                $this->collAngkutans = $collAngkutans;
                $this->collAngkutansPartial = false;
            }
        }

        return $this->collAngkutans;
    }

    /**
     * Sets a collection of Angkutan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $angkutans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setAngkutans(PropelCollection $angkutans, PropelPDO $con = null)
    {
        $angkutansToDelete = $this->getAngkutans(new Criteria(), $con)->diff($angkutans);

        $this->angkutansScheduledForDeletion = unserialize(serialize($angkutansToDelete));

        foreach ($angkutansToDelete as $angkutanRemoved) {
            $angkutanRemoved->setJenisHapusBuku(null);
        }

        $this->collAngkutans = null;
        foreach ($angkutans as $angkutan) {
            $this->addAngkutan($angkutan);
        }

        $this->collAngkutans = $angkutans;
        $this->collAngkutansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Angkutan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Angkutan objects.
     * @throws PropelException
     */
    public function countAngkutans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAngkutansPartial && !$this->isNew();
        if (null === $this->collAngkutans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAngkutans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAngkutans());
            }
            $query = AngkutanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisHapusBuku($this)
                ->count($con);
        }

        return count($this->collAngkutans);
    }

    /**
     * Method called to associate a Angkutan object to this object
     * through the Angkutan foreign key attribute.
     *
     * @param    Angkutan $l Angkutan
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function addAngkutan(Angkutan $l)
    {
        if ($this->collAngkutans === null) {
            $this->initAngkutans();
            $this->collAngkutansPartial = true;
        }
        if (!in_array($l, $this->collAngkutans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAngkutan($l);
        }

        return $this;
    }

    /**
     * @param	Angkutan $angkutan The angkutan object to add.
     */
    protected function doAddAngkutan($angkutan)
    {
        $this->collAngkutans[]= $angkutan;
        $angkutan->setJenisHapusBuku($this);
    }

    /**
     * @param	Angkutan $angkutan The angkutan object to remove.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function removeAngkutan($angkutan)
    {
        if ($this->getAngkutans()->contains($angkutan)) {
            $this->collAngkutans->remove($this->collAngkutans->search($angkutan));
            if (null === $this->angkutansScheduledForDeletion) {
                $this->angkutansScheduledForDeletion = clone $this->collAngkutans;
                $this->angkutansScheduledForDeletion->clear();
            }
            $this->angkutansScheduledForDeletion[]= $angkutan;
            $angkutan->setJenisHapusBuku(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinJenisSarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('JenisSarana', $join_behavior);

        return $this->getAngkutans($query, $con);
    }

    /**
     * Clears out the collBangunans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisHapusBuku The current object (for fluent API support)
     * @see        addBangunans()
     */
    public function clearBangunans()
    {
        $this->collBangunans = null; // important to set this to null since that means it is uninitialized
        $this->collBangunansPartial = null;

        return $this;
    }

    /**
     * reset is the collBangunans collection loaded partially
     *
     * @return void
     */
    public function resetPartialBangunans($v = true)
    {
        $this->collBangunansPartial = $v;
    }

    /**
     * Initializes the collBangunans collection.
     *
     * By default this just sets the collBangunans collection to an empty array (like clearcollBangunans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBangunans($overrideExisting = true)
    {
        if (null !== $this->collBangunans && !$overrideExisting) {
            return;
        }
        $this->collBangunans = new PropelObjectCollection();
        $this->collBangunans->setModel('Bangunan');
    }

    /**
     * Gets an array of Bangunan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisHapusBuku is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     * @throws PropelException
     */
    public function getBangunans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBangunansPartial && !$this->isNew();
        if (null === $this->collBangunans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBangunans) {
                // return empty collection
                $this->initBangunans();
            } else {
                $collBangunans = BangunanQuery::create(null, $criteria)
                    ->filterByJenisHapusBuku($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBangunansPartial && count($collBangunans)) {
                      $this->initBangunans(false);

                      foreach($collBangunans as $obj) {
                        if (false == $this->collBangunans->contains($obj)) {
                          $this->collBangunans->append($obj);
                        }
                      }

                      $this->collBangunansPartial = true;
                    }

                    $collBangunans->getInternalIterator()->rewind();
                    return $collBangunans;
                }

                if($partial && $this->collBangunans) {
                    foreach($this->collBangunans as $obj) {
                        if($obj->isNew()) {
                            $collBangunans[] = $obj;
                        }
                    }
                }

                $this->collBangunans = $collBangunans;
                $this->collBangunansPartial = false;
            }
        }

        return $this->collBangunans;
    }

    /**
     * Sets a collection of Bangunan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bangunans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setBangunans(PropelCollection $bangunans, PropelPDO $con = null)
    {
        $bangunansToDelete = $this->getBangunans(new Criteria(), $con)->diff($bangunans);

        $this->bangunansScheduledForDeletion = unserialize(serialize($bangunansToDelete));

        foreach ($bangunansToDelete as $bangunanRemoved) {
            $bangunanRemoved->setJenisHapusBuku(null);
        }

        $this->collBangunans = null;
        foreach ($bangunans as $bangunan) {
            $this->addBangunan($bangunan);
        }

        $this->collBangunans = $bangunans;
        $this->collBangunansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bangunan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bangunan objects.
     * @throws PropelException
     */
    public function countBangunans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBangunansPartial && !$this->isNew();
        if (null === $this->collBangunans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBangunans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBangunans());
            }
            $query = BangunanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisHapusBuku($this)
                ->count($con);
        }

        return count($this->collBangunans);
    }

    /**
     * Method called to associate a Bangunan object to this object
     * through the Bangunan foreign key attribute.
     *
     * @param    Bangunan $l Bangunan
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function addBangunan(Bangunan $l)
    {
        if ($this->collBangunans === null) {
            $this->initBangunans();
            $this->collBangunansPartial = true;
        }
        if (!in_array($l, $this->collBangunans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBangunan($l);
        }

        return $this;
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to add.
     */
    protected function doAddBangunan($bangunan)
    {
        $this->collBangunans[]= $bangunan;
        $bangunan->setJenisHapusBuku($this);
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to remove.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function removeBangunan($bangunan)
    {
        if ($this->getBangunans()->contains($bangunan)) {
            $this->collBangunans->remove($this->collBangunans->search($bangunan));
            if (null === $this->bangunansScheduledForDeletion) {
                $this->bangunansScheduledForDeletion = clone $this->collBangunans;
                $this->bangunansScheduledForDeletion->clear();
            }
            $this->bangunansScheduledForDeletion[]= $bangunan;
            $bangunan->setJenisHapusBuku(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinTanah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Tanah', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getBangunans($query, $con);
    }

    /**
     * Clears out the collBukus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisHapusBuku The current object (for fluent API support)
     * @see        addBukus()
     */
    public function clearBukus()
    {
        $this->collBukus = null; // important to set this to null since that means it is uninitialized
        $this->collBukusPartial = null;

        return $this;
    }

    /**
     * reset is the collBukus collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukus($v = true)
    {
        $this->collBukusPartial = $v;
    }

    /**
     * Initializes the collBukus collection.
     *
     * By default this just sets the collBukus collection to an empty array (like clearcollBukus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukus($overrideExisting = true)
    {
        if (null !== $this->collBukus && !$overrideExisting) {
            return;
        }
        $this->collBukus = new PropelObjectCollection();
        $this->collBukus->setModel('Buku');
    }

    /**
     * Gets an array of Buku objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisHapusBuku is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Buku[] List of Buku objects
     * @throws PropelException
     */
    public function getBukus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                // return empty collection
                $this->initBukus();
            } else {
                $collBukus = BukuQuery::create(null, $criteria)
                    ->filterByJenisHapusBuku($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukusPartial && count($collBukus)) {
                      $this->initBukus(false);

                      foreach($collBukus as $obj) {
                        if (false == $this->collBukus->contains($obj)) {
                          $this->collBukus->append($obj);
                        }
                      }

                      $this->collBukusPartial = true;
                    }

                    $collBukus->getInternalIterator()->rewind();
                    return $collBukus;
                }

                if($partial && $this->collBukus) {
                    foreach($this->collBukus as $obj) {
                        if($obj->isNew()) {
                            $collBukus[] = $obj;
                        }
                    }
                }

                $this->collBukus = $collBukus;
                $this->collBukusPartial = false;
            }
        }

        return $this->collBukus;
    }

    /**
     * Sets a collection of Buku objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setBukus(PropelCollection $bukus, PropelPDO $con = null)
    {
        $bukusToDelete = $this->getBukus(new Criteria(), $con)->diff($bukus);

        $this->bukusScheduledForDeletion = unserialize(serialize($bukusToDelete));

        foreach ($bukusToDelete as $bukuRemoved) {
            $bukuRemoved->setJenisHapusBuku(null);
        }

        $this->collBukus = null;
        foreach ($bukus as $buku) {
            $this->addBuku($buku);
        }

        $this->collBukus = $bukus;
        $this->collBukusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Buku objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Buku objects.
     * @throws PropelException
     */
    public function countBukus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukus());
            }
            $query = BukuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisHapusBuku($this)
                ->count($con);
        }

        return count($this->collBukus);
    }

    /**
     * Method called to associate a Buku object to this object
     * through the Buku foreign key attribute.
     *
     * @param    Buku $l Buku
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function addBuku(Buku $l)
    {
        if ($this->collBukus === null) {
            $this->initBukus();
            $this->collBukusPartial = true;
        }
        if (!in_array($l, $this->collBukus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBuku($l);
        }

        return $this;
    }

    /**
     * @param	Buku $buku The buku object to add.
     */
    protected function doAddBuku($buku)
    {
        $this->collBukus[]= $buku;
        $buku->setJenisHapusBuku($this);
    }

    /**
     * @param	Buku $buku The buku object to remove.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function removeBuku($buku)
    {
        if ($this->getBukus()->contains($buku)) {
            $this->collBukus->remove($this->collBukus->search($buku));
            if (null === $this->bukusScheduledForDeletion) {
                $this->bukusScheduledForDeletion = clone $this->collBukus;
                $this->bukusScheduledForDeletion->clear();
            }
            $this->bukusScheduledForDeletion[]= $buku;
            $buku->setJenisHapusBuku(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinBiblio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Biblio', $join_behavior);

        return $this->getBukus($query, $con);
    }

    /**
     * Clears out the collTanahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisHapusBuku The current object (for fluent API support)
     * @see        addTanahs()
     */
    public function clearTanahs()
    {
        $this->collTanahs = null; // important to set this to null since that means it is uninitialized
        $this->collTanahsPartial = null;

        return $this;
    }

    /**
     * reset is the collTanahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialTanahs($v = true)
    {
        $this->collTanahsPartial = $v;
    }

    /**
     * Initializes the collTanahs collection.
     *
     * By default this just sets the collTanahs collection to an empty array (like clearcollTanahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTanahs($overrideExisting = true)
    {
        if (null !== $this->collTanahs && !$overrideExisting) {
            return;
        }
        $this->collTanahs = new PropelObjectCollection();
        $this->collTanahs->setModel('Tanah');
    }

    /**
     * Gets an array of Tanah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisHapusBuku is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     * @throws PropelException
     */
    public function getTanahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTanahsPartial && !$this->isNew();
        if (null === $this->collTanahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTanahs) {
                // return empty collection
                $this->initTanahs();
            } else {
                $collTanahs = TanahQuery::create(null, $criteria)
                    ->filterByJenisHapusBuku($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTanahsPartial && count($collTanahs)) {
                      $this->initTanahs(false);

                      foreach($collTanahs as $obj) {
                        if (false == $this->collTanahs->contains($obj)) {
                          $this->collTanahs->append($obj);
                        }
                      }

                      $this->collTanahsPartial = true;
                    }

                    $collTanahs->getInternalIterator()->rewind();
                    return $collTanahs;
                }

                if($partial && $this->collTanahs) {
                    foreach($this->collTanahs as $obj) {
                        if($obj->isNew()) {
                            $collTanahs[] = $obj;
                        }
                    }
                }

                $this->collTanahs = $collTanahs;
                $this->collTanahsPartial = false;
            }
        }

        return $this->collTanahs;
    }

    /**
     * Sets a collection of Tanah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tanahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function setTanahs(PropelCollection $tanahs, PropelPDO $con = null)
    {
        $tanahsToDelete = $this->getTanahs(new Criteria(), $con)->diff($tanahs);

        $this->tanahsScheduledForDeletion = unserialize(serialize($tanahsToDelete));

        foreach ($tanahsToDelete as $tanahRemoved) {
            $tanahRemoved->setJenisHapusBuku(null);
        }

        $this->collTanahs = null;
        foreach ($tanahs as $tanah) {
            $this->addTanah($tanah);
        }

        $this->collTanahs = $tanahs;
        $this->collTanahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tanah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Tanah objects.
     * @throws PropelException
     */
    public function countTanahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTanahsPartial && !$this->isNew();
        if (null === $this->collTanahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTanahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTanahs());
            }
            $query = TanahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisHapusBuku($this)
                ->count($con);
        }

        return count($this->collTanahs);
    }

    /**
     * Method called to associate a Tanah object to this object
     * through the Tanah foreign key attribute.
     *
     * @param    Tanah $l Tanah
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function addTanah(Tanah $l)
    {
        if ($this->collTanahs === null) {
            $this->initTanahs();
            $this->collTanahsPartial = true;
        }
        if (!in_array($l, $this->collTanahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTanah($l);
        }

        return $this;
    }

    /**
     * @param	Tanah $tanah The tanah object to add.
     */
    protected function doAddTanah($tanah)
    {
        $this->collTanahs[]= $tanah;
        $tanah->setJenisHapusBuku($this);
    }

    /**
     * @param	Tanah $tanah The tanah object to remove.
     * @return JenisHapusBuku The current object (for fluent API support)
     */
    public function removeTanah($tanah)
    {
        if ($this->getTanahs()->contains($tanah)) {
            $this->collTanahs->remove($this->collTanahs->search($tanah));
            if (null === $this->tanahsScheduledForDeletion) {
                $this->tanahsScheduledForDeletion = clone $this->collTanahs;
                $this->tanahsScheduledForDeletion->clear();
            }
            $this->tanahsScheduledForDeletion[]= $tanah;
            $tanah->setJenisHapusBuku(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisHapusBuku is new, it will return
     * an empty collection; or if this JenisHapusBuku has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisHapusBuku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getTanahs($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_hapus_buku = null;
        $this->ket_hapus_buku = null;
        $this->u_prasarana = null;
        $this->u_sarana = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->expired_date = null;
        $this->last_sync = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collAlats) {
                foreach ($this->collAlats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAngkutans) {
                foreach ($this->collAngkutans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBangunans) {
                foreach ($this->collBangunans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBukus) {
                foreach ($this->collBukus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTanahs) {
                foreach ($this->collTanahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlats instanceof PropelCollection) {
            $this->collAlats->clearIterator();
        }
        $this->collAlats = null;
        if ($this->collAngkutans instanceof PropelCollection) {
            $this->collAngkutans->clearIterator();
        }
        $this->collAngkutans = null;
        if ($this->collBangunans instanceof PropelCollection) {
            $this->collBangunans->clearIterator();
        }
        $this->collBangunans = null;
        if ($this->collBukus instanceof PropelCollection) {
            $this->collBukus->clearIterator();
        }
        $this->collBukus = null;
        if ($this->collTanahs instanceof PropelCollection) {
            $this->collTanahs->clearIterator();
        }
        $this->collTanahs = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenisHapusBukuPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
