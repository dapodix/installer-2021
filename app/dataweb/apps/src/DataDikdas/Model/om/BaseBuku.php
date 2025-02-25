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
use DataDikdas\Model\Biblio;
use DataDikdas\Model\BiblioQuery;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuLongitudinal;
use DataDikdas\Model\BukuLongitudinalQuery;
use DataDikdas\Model\BukuPeer;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisHapusBukuQuery;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\TingkatPendidikanQuery;

/**
 * Base class that represents a row from the 'buku' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBuku extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BukuPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BukuPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_buku field.
     * @var        string
     */
    protected $id_buku;

    /**
     * The value for the mata_pelajaran_id field.
     * @var        int
     */
    protected $mata_pelajaran_id;

    /**
     * The value for the id_ruang field.
     * @var        string
     */
    protected $id_ruang;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the id_biblio field.
     * @var        string
     */
    protected $id_biblio;

    /**
     * The value for the tingkat_pendidikan_id field.
     * @var        string
     */
    protected $tingkat_pendidikan_id;

    /**
     * The value for the nm_buku field.
     * @var        string
     */
    protected $nm_buku;

    /**
     * The value for the id_hapus_buku field.
     * @var        string
     */
    protected $id_hapus_buku;

    /**
     * The value for the tgl_hapus_buku field.
     * @var        string
     */
    protected $tgl_hapus_buku;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

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
     * The value for the soft_delete field.
     * @var        string
     */
    protected $soft_delete;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * The value for the updater_id field.
     * @var        string
     */
    protected $updater_id;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaran;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        TingkatPendidikan
     */
    protected $aTingkatPendidikan;

    /**
     * @var        JenisHapusBuku
     */
    protected $aJenisHapusBuku;

    /**
     * @var        Ruang
     */
    protected $aRuang;

    /**
     * @var        Biblio
     */
    protected $aBiblio;

    /**
     * @var        PropelObjectCollection|BukuLongitudinal[] Collection to store aggregation of BukuLongitudinal objects.
     */
    protected $collBukuLongitudinals;
    protected $collBukuLongitudinalsPartial;

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
    protected $bukuLongitudinalsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->asal_data = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseBuku object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_buku] column value.
     * 
     * @return string
     */
    public function getIdBuku()
    {
        return $this->id_buku;
    }

    /**
     * Get the [mata_pelajaran_id] column value.
     * 
     * @return int
     */
    public function getMataPelajaranId()
    {
        return $this->mata_pelajaran_id;
    }

    /**
     * Get the [id_ruang] column value.
     * 
     * @return string
     */
    public function getIdRuang()
    {
        return $this->id_ruang;
    }

    /**
     * Get the [sekolah_id] column value.
     * 
     * @return string
     */
    public function getSekolahId()
    {
        return $this->sekolah_id;
    }

    /**
     * Get the [id_biblio] column value.
     * 
     * @return string
     */
    public function getIdBiblio()
    {
        return $this->id_biblio;
    }

    /**
     * Get the [tingkat_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getTingkatPendidikanId()
    {
        return $this->tingkat_pendidikan_id;
    }

    /**
     * Get the [nm_buku] column value.
     * 
     * @return string
     */
    public function getNmBuku()
    {
        return $this->nm_buku;
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
     * Get the [optionally formatted] temporal [tgl_hapus_buku] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglHapusBuku($format = '%Y-%m-%d')
    {
        if ($this->tgl_hapus_buku === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_hapus_buku);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_hapus_buku, true), $x);
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
     * Get the [asal_data] column value.
     * 
     * @return string
     */
    public function getAsalData()
    {
        return $this->asal_data;
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
     * Get the [soft_delete] column value.
     * 
     * @return string
     */
    public function getSoftDelete()
    {
        return $this->soft_delete;
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
     * Get the [updater_id] column value.
     * 
     * @return string
     */
    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    /**
     * Set the value of [id_buku] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setIdBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_buku !== $v) {
            $this->id_buku = $v;
            $this->modifiedColumns[] = BukuPeer::ID_BUKU;
        }


        return $this;
    } // setIdBuku()

    /**
     * Set the value of [mata_pelajaran_id] column.
     * 
     * @param int $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setMataPelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mata_pelajaran_id !== $v) {
            $this->mata_pelajaran_id = $v;
            $this->modifiedColumns[] = BukuPeer::MATA_PELAJARAN_ID;
        }

        if ($this->aMataPelajaran !== null && $this->aMataPelajaran->getMataPelajaranId() !== $v) {
            $this->aMataPelajaran = null;
        }


        return $this;
    } // setMataPelajaranId()

    /**
     * Set the value of [id_ruang] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_ruang !== $v) {
            $this->id_ruang = $v;
            $this->modifiedColumns[] = BukuPeer::ID_RUANG;
        }

        if ($this->aRuang !== null && $this->aRuang->getIdRuang() !== $v) {
            $this->aRuang = null;
        }


        return $this;
    } // setIdRuang()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = BukuPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [id_biblio] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setIdBiblio($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_biblio !== $v) {
            $this->id_biblio = $v;
            $this->modifiedColumns[] = BukuPeer::ID_BIBLIO;
        }

        if ($this->aBiblio !== null && $this->aBiblio->getIdBiblio() !== $v) {
            $this->aBiblio = null;
        }


        return $this;
    } // setIdBiblio()

    /**
     * Set the value of [tingkat_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setTingkatPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tingkat_pendidikan_id !== $v) {
            $this->tingkat_pendidikan_id = $v;
            $this->modifiedColumns[] = BukuPeer::TINGKAT_PENDIDIKAN_ID;
        }

        if ($this->aTingkatPendidikan !== null && $this->aTingkatPendidikan->getTingkatPendidikanId() !== $v) {
            $this->aTingkatPendidikan = null;
        }


        return $this;
    } // setTingkatPendidikanId()

    /**
     * Set the value of [nm_buku] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setNmBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_buku !== $v) {
            $this->nm_buku = $v;
            $this->modifiedColumns[] = BukuPeer::NM_BUKU;
        }


        return $this;
    } // setNmBuku()

    /**
     * Set the value of [id_hapus_buku] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setIdHapusBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_hapus_buku !== $v) {
            $this->id_hapus_buku = $v;
            $this->modifiedColumns[] = BukuPeer::ID_HAPUS_BUKU;
        }

        if ($this->aJenisHapusBuku !== null && $this->aJenisHapusBuku->getIdHapusBuku() !== $v) {
            $this->aJenisHapusBuku = null;
        }


        return $this;
    } // setIdHapusBuku()

    /**
     * Sets the value of [tgl_hapus_buku] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Buku The current object (for fluent API support)
     */
    public function setTglHapusBuku($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_hapus_buku !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_hapus_buku !== null && $tmpDt = new DateTime($this->tgl_hapus_buku)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_hapus_buku = $newDateAsString;
                $this->modifiedColumns[] = BukuPeer::TGL_HAPUS_BUKU;
            }
        } // if either are not null


        return $this;
    } // setTglHapusBuku()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = BukuPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Buku The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BukuPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Buku The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BukuPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = BukuPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Buku The current object (for fluent API support)
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
                $this->modifiedColumns[] = BukuPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Buku The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = BukuPeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

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
            if ($this->asal_data !== '1') {
                return false;
            }

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

            $this->id_buku = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->mata_pelajaran_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->id_ruang = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sekolah_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->id_biblio = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tingkat_pendidikan_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->nm_buku = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->id_hapus_buku = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tgl_hapus_buku = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->asal_data = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->create_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_update = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->soft_delete = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_sync = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updater_id = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = BukuPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Buku object", $e);
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

        if ($this->aMataPelajaran !== null && $this->mata_pelajaran_id !== $this->aMataPelajaran->getMataPelajaranId()) {
            $this->aMataPelajaran = null;
        }
        if ($this->aRuang !== null && $this->id_ruang !== $this->aRuang->getIdRuang()) {
            $this->aRuang = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aBiblio !== null && $this->id_biblio !== $this->aBiblio->getIdBiblio()) {
            $this->aBiblio = null;
        }
        if ($this->aTingkatPendidikan !== null && $this->tingkat_pendidikan_id !== $this->aTingkatPendidikan->getTingkatPendidikanId()) {
            $this->aTingkatPendidikan = null;
        }
        if ($this->aJenisHapusBuku !== null && $this->id_hapus_buku !== $this->aJenisHapusBuku->getIdHapusBuku()) {
            $this->aJenisHapusBuku = null;
        }
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
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BukuPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMataPelajaran = null;
            $this->aSekolah = null;
            $this->aTingkatPendidikan = null;
            $this->aJenisHapusBuku = null;
            $this->aRuang = null;
            $this->aBiblio = null;
            $this->collBukuLongitudinals = null;

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
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BukuQuery::create()
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
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BukuPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMataPelajaran !== null) {
                if ($this->aMataPelajaran->isModified() || $this->aMataPelajaran->isNew()) {
                    $affectedRows += $this->aMataPelajaran->save($con);
                }
                $this->setMataPelajaran($this->aMataPelajaran);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->aTingkatPendidikan !== null) {
                if ($this->aTingkatPendidikan->isModified() || $this->aTingkatPendidikan->isNew()) {
                    $affectedRows += $this->aTingkatPendidikan->save($con);
                }
                $this->setTingkatPendidikan($this->aTingkatPendidikan);
            }

            if ($this->aJenisHapusBuku !== null) {
                if ($this->aJenisHapusBuku->isModified() || $this->aJenisHapusBuku->isNew()) {
                    $affectedRows += $this->aJenisHapusBuku->save($con);
                }
                $this->setJenisHapusBuku($this->aJenisHapusBuku);
            }

            if ($this->aRuang !== null) {
                if ($this->aRuang->isModified() || $this->aRuang->isNew()) {
                    $affectedRows += $this->aRuang->save($con);
                }
                $this->setRuang($this->aRuang);
            }

            if ($this->aBiblio !== null) {
                if ($this->aBiblio->isModified() || $this->aBiblio->isNew()) {
                    $affectedRows += $this->aBiblio->save($con);
                }
                $this->setBiblio($this->aBiblio);
            }

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

            if ($this->bukuLongitudinalsScheduledForDeletion !== null) {
                if (!$this->bukuLongitudinalsScheduledForDeletion->isEmpty()) {
                    BukuLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->bukuLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bukuLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collBukuLongitudinals !== null) {
                foreach ($this->collBukuLongitudinals as $referrerFK) {
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
        if ($this->isColumnModified(BukuPeer::ID_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"id_buku"';
        }
        if ($this->isColumnModified(BukuPeer::MATA_PELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mata_pelajaran_id"';
        }
        if ($this->isColumnModified(BukuPeer::ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"id_ruang"';
        }
        if ($this->isColumnModified(BukuPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(BukuPeer::ID_BIBLIO)) {
            $modifiedColumns[':p' . $index++]  = '"id_biblio"';
        }
        if ($this->isColumnModified(BukuPeer::TINGKAT_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tingkat_pendidikan_id"';
        }
        if ($this->isColumnModified(BukuPeer::NM_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"nm_buku"';
        }
        if ($this->isColumnModified(BukuPeer::ID_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"id_hapus_buku"';
        }
        if ($this->isColumnModified(BukuPeer::TGL_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_hapus_buku"';
        }
        if ($this->isColumnModified(BukuPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(BukuPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BukuPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BukuPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(BukuPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(BukuPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "buku" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_buku"':						
                        $stmt->bindValue($identifier, $this->id_buku, PDO::PARAM_STR);
                        break;
                    case '"mata_pelajaran_id"':						
                        $stmt->bindValue($identifier, $this->mata_pelajaran_id, PDO::PARAM_INT);
                        break;
                    case '"id_ruang"':						
                        $stmt->bindValue($identifier, $this->id_ruang, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"id_biblio"':						
                        $stmt->bindValue($identifier, $this->id_biblio, PDO::PARAM_STR);
                        break;
                    case '"tingkat_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->tingkat_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"nm_buku"':						
                        $stmt->bindValue($identifier, $this->nm_buku, PDO::PARAM_STR);
                        break;
                    case '"id_hapus_buku"':						
                        $stmt->bindValue($identifier, $this->id_hapus_buku, PDO::PARAM_STR);
                        break;
                    case '"tgl_hapus_buku"':						
                        $stmt->bindValue($identifier, $this->tgl_hapus_buku, PDO::PARAM_STR);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"soft_delete"':						
                        $stmt->bindValue($identifier, $this->soft_delete, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                    case '"updater_id"':						
                        $stmt->bindValue($identifier, $this->updater_id, PDO::PARAM_STR);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMataPelajaran !== null) {
                if (!$this->aMataPelajaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaran->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aTingkatPendidikan !== null) {
                if (!$this->aTingkatPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTingkatPendidikan->getValidationFailures());
                }
            }

            if ($this->aJenisHapusBuku !== null) {
                if (!$this->aJenisHapusBuku->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisHapusBuku->getValidationFailures());
                }
            }

            if ($this->aRuang !== null) {
                if (!$this->aRuang->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRuang->getValidationFailures());
                }
            }

            if ($this->aBiblio !== null) {
                if (!$this->aBiblio->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBiblio->getValidationFailures());
                }
            }


            if (($retval = BukuPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBukuLongitudinals !== null) {
                    foreach ($this->collBukuLongitudinals as $referrerFK) {
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
        $pos = BukuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdBuku();
                break;
            case 1:
                return $this->getMataPelajaranId();
                break;
            case 2:
                return $this->getIdRuang();
                break;
            case 3:
                return $this->getSekolahId();
                break;
            case 4:
                return $this->getIdBiblio();
                break;
            case 5:
                return $this->getTingkatPendidikanId();
                break;
            case 6:
                return $this->getNmBuku();
                break;
            case 7:
                return $this->getIdHapusBuku();
                break;
            case 8:
                return $this->getTglHapusBuku();
                break;
            case 9:
                return $this->getAsalData();
                break;
            case 10:
                return $this->getCreateDate();
                break;
            case 11:
                return $this->getLastUpdate();
                break;
            case 12:
                return $this->getSoftDelete();
                break;
            case 13:
                return $this->getLastSync();
                break;
            case 14:
                return $this->getUpdaterId();
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
        if (isset($alreadyDumpedObjects['Buku'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Buku'][$this->getPrimaryKey()] = true;
        $keys = BukuPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdBuku(),
            $keys[1] => $this->getMataPelajaranId(),
            $keys[2] => $this->getIdRuang(),
            $keys[3] => $this->getSekolahId(),
            $keys[4] => $this->getIdBiblio(),
            $keys[5] => $this->getTingkatPendidikanId(),
            $keys[6] => $this->getNmBuku(),
            $keys[7] => $this->getIdHapusBuku(),
            $keys[8] => $this->getTglHapusBuku(),
            $keys[9] => $this->getAsalData(),
            $keys[10] => $this->getCreateDate(),
            $keys[11] => $this->getLastUpdate(),
            $keys[12] => $this->getSoftDelete(),
            $keys[13] => $this->getLastSync(),
            $keys[14] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMataPelajaran) {
                $result['MataPelajaran'] = $this->aMataPelajaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTingkatPendidikan) {
                $result['TingkatPendidikan'] = $this->aTingkatPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisHapusBuku) {
                $result['JenisHapusBuku'] = $this->aJenisHapusBuku->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRuang) {
                $result['Ruang'] = $this->aRuang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBiblio) {
                $result['Biblio'] = $this->aBiblio->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBukuLongitudinals) {
                $result['BukuLongitudinals'] = $this->collBukuLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BukuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdBuku($value);
                break;
            case 1:
                $this->setMataPelajaranId($value);
                break;
            case 2:
                $this->setIdRuang($value);
                break;
            case 3:
                $this->setSekolahId($value);
                break;
            case 4:
                $this->setIdBiblio($value);
                break;
            case 5:
                $this->setTingkatPendidikanId($value);
                break;
            case 6:
                $this->setNmBuku($value);
                break;
            case 7:
                $this->setIdHapusBuku($value);
                break;
            case 8:
                $this->setTglHapusBuku($value);
                break;
            case 9:
                $this->setAsalData($value);
                break;
            case 10:
                $this->setCreateDate($value);
                break;
            case 11:
                $this->setLastUpdate($value);
                break;
            case 12:
                $this->setSoftDelete($value);
                break;
            case 13:
                $this->setLastSync($value);
                break;
            case 14:
                $this->setUpdaterId($value);
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
        $keys = BukuPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdBuku($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMataPelajaranId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdRuang($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSekolahId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIdBiblio($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTingkatPendidikanId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNmBuku($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIdHapusBuku($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTglHapusBuku($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAsalData($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreateDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastUpdate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSoftDelete($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastSync($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setUpdaterId($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BukuPeer::DATABASE_NAME);

        if ($this->isColumnModified(BukuPeer::ID_BUKU)) $criteria->add(BukuPeer::ID_BUKU, $this->id_buku);
        if ($this->isColumnModified(BukuPeer::MATA_PELAJARAN_ID)) $criteria->add(BukuPeer::MATA_PELAJARAN_ID, $this->mata_pelajaran_id);
        if ($this->isColumnModified(BukuPeer::ID_RUANG)) $criteria->add(BukuPeer::ID_RUANG, $this->id_ruang);
        if ($this->isColumnModified(BukuPeer::SEKOLAH_ID)) $criteria->add(BukuPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(BukuPeer::ID_BIBLIO)) $criteria->add(BukuPeer::ID_BIBLIO, $this->id_biblio);
        if ($this->isColumnModified(BukuPeer::TINGKAT_PENDIDIKAN_ID)) $criteria->add(BukuPeer::TINGKAT_PENDIDIKAN_ID, $this->tingkat_pendidikan_id);
        if ($this->isColumnModified(BukuPeer::NM_BUKU)) $criteria->add(BukuPeer::NM_BUKU, $this->nm_buku);
        if ($this->isColumnModified(BukuPeer::ID_HAPUS_BUKU)) $criteria->add(BukuPeer::ID_HAPUS_BUKU, $this->id_hapus_buku);
        if ($this->isColumnModified(BukuPeer::TGL_HAPUS_BUKU)) $criteria->add(BukuPeer::TGL_HAPUS_BUKU, $this->tgl_hapus_buku);
        if ($this->isColumnModified(BukuPeer::ASAL_DATA)) $criteria->add(BukuPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(BukuPeer::CREATE_DATE)) $criteria->add(BukuPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BukuPeer::LAST_UPDATE)) $criteria->add(BukuPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BukuPeer::SOFT_DELETE)) $criteria->add(BukuPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(BukuPeer::LAST_SYNC)) $criteria->add(BukuPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(BukuPeer::UPDATER_ID)) $criteria->add(BukuPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(BukuPeer::DATABASE_NAME);
        $criteria->add(BukuPeer::ID_BUKU, $this->id_buku);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdBuku();
    }

    /**
     * Generic method to set the primary key (id_buku column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdBuku($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdBuku();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Buku (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMataPelajaranId($this->getMataPelajaranId());
        $copyObj->setIdRuang($this->getIdRuang());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setIdBiblio($this->getIdBiblio());
        $copyObj->setTingkatPendidikanId($this->getTingkatPendidikanId());
        $copyObj->setNmBuku($this->getNmBuku());
        $copyObj->setIdHapusBuku($this->getIdHapusBuku());
        $copyObj->setTglHapusBuku($this->getTglHapusBuku());
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBukuLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBukuLongitudinal($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdBuku(NULL); // this is a auto-increment column, so set to default value
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
     * @return Buku Clone of current object.
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
     * @return BukuPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BukuPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return Buku The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaran(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMataPelajaranId(NULL);
        } else {
            $this->setMataPelajaranId($v->getMataPelajaranId());
        }

        $this->aMataPelajaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addBuku($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaran === null && ($this->mata_pelajaran_id !== null) && $doQuery) {
            $this->aMataPelajaran = MataPelajaranQuery::create()->findPk($this->mata_pelajaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaran->addBukus($this);
             */
        }

        return $this->aMataPelajaran;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Buku The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolah(Sekolah $v = null)
    {
        if ($v === null) {
            $this->setSekolahId(NULL);
        } else {
            $this->setSekolahId($v->getSekolahId());
        }

        $this->aSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addBuku($this);
        }


        return $this;
    }


    /**
     * Get the associated Sekolah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sekolah The associated Sekolah object.
     * @throws PropelException
     */
    public function getSekolah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSekolah === null && (($this->sekolah_id !== "" && $this->sekolah_id !== null)) && $doQuery) {
            $this->aSekolah = SekolahQuery::create()->findPk($this->sekolah_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolah->addBukus($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a TingkatPendidikan object.
     *
     * @param             TingkatPendidikan $v
     * @return Buku The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTingkatPendidikan(TingkatPendidikan $v = null)
    {
        if ($v === null) {
            $this->setTingkatPendidikanId(NULL);
        } else {
            $this->setTingkatPendidikanId($v->getTingkatPendidikanId());
        }

        $this->aTingkatPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TingkatPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addBuku($this);
        }


        return $this;
    }


    /**
     * Get the associated TingkatPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TingkatPendidikan The associated TingkatPendidikan object.
     * @throws PropelException
     */
    public function getTingkatPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTingkatPendidikan === null && (($this->tingkat_pendidikan_id !== "" && $this->tingkat_pendidikan_id !== null)) && $doQuery) {
            $this->aTingkatPendidikan = TingkatPendidikanQuery::create()->findPk($this->tingkat_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTingkatPendidikan->addBukus($this);
             */
        }

        return $this->aTingkatPendidikan;
    }

    /**
     * Declares an association between this object and a JenisHapusBuku object.
     *
     * @param             JenisHapusBuku $v
     * @return Buku The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisHapusBuku(JenisHapusBuku $v = null)
    {
        if ($v === null) {
            $this->setIdHapusBuku(NULL);
        } else {
            $this->setIdHapusBuku($v->getIdHapusBuku());
        }

        $this->aJenisHapusBuku = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisHapusBuku object, it will not be re-added.
        if ($v !== null) {
            $v->addBuku($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisHapusBuku object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisHapusBuku The associated JenisHapusBuku object.
     * @throws PropelException
     */
    public function getJenisHapusBuku(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisHapusBuku === null && (($this->id_hapus_buku !== "" && $this->id_hapus_buku !== null)) && $doQuery) {
            $this->aJenisHapusBuku = JenisHapusBukuQuery::create()->findPk($this->id_hapus_buku, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisHapusBuku->addBukus($this);
             */
        }

        return $this->aJenisHapusBuku;
    }

    /**
     * Declares an association between this object and a Ruang object.
     *
     * @param             Ruang $v
     * @return Buku The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRuang(Ruang $v = null)
    {
        if ($v === null) {
            $this->setIdRuang(NULL);
        } else {
            $this->setIdRuang($v->getIdRuang());
        }

        $this->aRuang = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ruang object, it will not be re-added.
        if ($v !== null) {
            $v->addBuku($this);
        }


        return $this;
    }


    /**
     * Get the associated Ruang object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ruang The associated Ruang object.
     * @throws PropelException
     */
    public function getRuang(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRuang === null && (($this->id_ruang !== "" && $this->id_ruang !== null)) && $doQuery) {
            $this->aRuang = RuangQuery::create()->findPk($this->id_ruang, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRuang->addBukus($this);
             */
        }

        return $this->aRuang;
    }

    /**
     * Declares an association between this object and a Biblio object.
     *
     * @param             Biblio $v
     * @return Buku The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBiblio(Biblio $v = null)
    {
        if ($v === null) {
            $this->setIdBiblio(NULL);
        } else {
            $this->setIdBiblio($v->getIdBiblio());
        }

        $this->aBiblio = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Biblio object, it will not be re-added.
        if ($v !== null) {
            $v->addBuku($this);
        }


        return $this;
    }


    /**
     * Get the associated Biblio object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Biblio The associated Biblio object.
     * @throws PropelException
     */
    public function getBiblio(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBiblio === null && (($this->id_biblio !== "" && $this->id_biblio !== null)) && $doQuery) {
            $this->aBiblio = BiblioQuery::create()->findPk($this->id_biblio, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBiblio->addBukus($this);
             */
        }

        return $this->aBiblio;
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
        if ('BukuLongitudinal' == $relationName) {
            $this->initBukuLongitudinals();
        }
    }

    /**
     * Clears out the collBukuLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Buku The current object (for fluent API support)
     * @see        addBukuLongitudinals()
     */
    public function clearBukuLongitudinals()
    {
        $this->collBukuLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collBukuLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collBukuLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukuLongitudinals($v = true)
    {
        $this->collBukuLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collBukuLongitudinals collection.
     *
     * By default this just sets the collBukuLongitudinals collection to an empty array (like clearcollBukuLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukuLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collBukuLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collBukuLongitudinals = new PropelObjectCollection();
        $this->collBukuLongitudinals->setModel('BukuLongitudinal');
    }

    /**
     * Gets an array of BukuLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Buku is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BukuLongitudinal[] List of BukuLongitudinal objects
     * @throws PropelException
     */
    public function getBukuLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukuLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBukuLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukuLongitudinals) {
                // return empty collection
                $this->initBukuLongitudinals();
            } else {
                $collBukuLongitudinals = BukuLongitudinalQuery::create(null, $criteria)
                    ->filterByBuku($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukuLongitudinalsPartial && count($collBukuLongitudinals)) {
                      $this->initBukuLongitudinals(false);

                      foreach($collBukuLongitudinals as $obj) {
                        if (false == $this->collBukuLongitudinals->contains($obj)) {
                          $this->collBukuLongitudinals->append($obj);
                        }
                      }

                      $this->collBukuLongitudinalsPartial = true;
                    }

                    $collBukuLongitudinals->getInternalIterator()->rewind();
                    return $collBukuLongitudinals;
                }

                if($partial && $this->collBukuLongitudinals) {
                    foreach($this->collBukuLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collBukuLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collBukuLongitudinals = $collBukuLongitudinals;
                $this->collBukuLongitudinalsPartial = false;
            }
        }

        return $this->collBukuLongitudinals;
    }

    /**
     * Sets a collection of BukuLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukuLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Buku The current object (for fluent API support)
     */
    public function setBukuLongitudinals(PropelCollection $bukuLongitudinals, PropelPDO $con = null)
    {
        $bukuLongitudinalsToDelete = $this->getBukuLongitudinals(new Criteria(), $con)->diff($bukuLongitudinals);

        $this->bukuLongitudinalsScheduledForDeletion = unserialize(serialize($bukuLongitudinalsToDelete));

        foreach ($bukuLongitudinalsToDelete as $bukuLongitudinalRemoved) {
            $bukuLongitudinalRemoved->setBuku(null);
        }

        $this->collBukuLongitudinals = null;
        foreach ($bukuLongitudinals as $bukuLongitudinal) {
            $this->addBukuLongitudinal($bukuLongitudinal);
        }

        $this->collBukuLongitudinals = $bukuLongitudinals;
        $this->collBukuLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BukuLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BukuLongitudinal objects.
     * @throws PropelException
     */
    public function countBukuLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukuLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBukuLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukuLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukuLongitudinals());
            }
            $query = BukuLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBuku($this)
                ->count($con);
        }

        return count($this->collBukuLongitudinals);
    }

    /**
     * Method called to associate a BukuLongitudinal object to this object
     * through the BukuLongitudinal foreign key attribute.
     *
     * @param    BukuLongitudinal $l BukuLongitudinal
     * @return Buku The current object (for fluent API support)
     */
    public function addBukuLongitudinal(BukuLongitudinal $l)
    {
        if ($this->collBukuLongitudinals === null) {
            $this->initBukuLongitudinals();
            $this->collBukuLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collBukuLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBukuLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	BukuLongitudinal $bukuLongitudinal The bukuLongitudinal object to add.
     */
    protected function doAddBukuLongitudinal($bukuLongitudinal)
    {
        $this->collBukuLongitudinals[]= $bukuLongitudinal;
        $bukuLongitudinal->setBuku($this);
    }

    /**
     * @param	BukuLongitudinal $bukuLongitudinal The bukuLongitudinal object to remove.
     * @return Buku The current object (for fluent API support)
     */
    public function removeBukuLongitudinal($bukuLongitudinal)
    {
        if ($this->getBukuLongitudinals()->contains($bukuLongitudinal)) {
            $this->collBukuLongitudinals->remove($this->collBukuLongitudinals->search($bukuLongitudinal));
            if (null === $this->bukuLongitudinalsScheduledForDeletion) {
                $this->bukuLongitudinalsScheduledForDeletion = clone $this->collBukuLongitudinals;
                $this->bukuLongitudinalsScheduledForDeletion->clear();
            }
            $this->bukuLongitudinalsScheduledForDeletion[]= clone $bukuLongitudinal;
            $bukuLongitudinal->setBuku(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Buku is new, it will return
     * an empty collection; or if this Buku has previously
     * been saved, it will retrieve related BukuLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Buku.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BukuLongitudinal[] List of BukuLongitudinal objects
     */
    public function getBukuLongitudinalsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getBukuLongitudinals($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_buku = null;
        $this->mata_pelajaran_id = null;
        $this->id_ruang = null;
        $this->sekolah_id = null;
        $this->id_biblio = null;
        $this->tingkat_pendidikan_id = null;
        $this->nm_buku = null;
        $this->id_hapus_buku = null;
        $this->tgl_hapus_buku = null;
        $this->asal_data = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->soft_delete = null;
        $this->last_sync = null;
        $this->updater_id = null;
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
            if ($this->collBukuLongitudinals) {
                foreach ($this->collBukuLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMataPelajaran instanceof Persistent) {
              $this->aMataPelajaran->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aTingkatPendidikan instanceof Persistent) {
              $this->aTingkatPendidikan->clearAllReferences($deep);
            }
            if ($this->aJenisHapusBuku instanceof Persistent) {
              $this->aJenisHapusBuku->clearAllReferences($deep);
            }
            if ($this->aRuang instanceof Persistent) {
              $this->aRuang->clearAllReferences($deep);
            }
            if ($this->aBiblio instanceof Persistent) {
              $this->aBiblio->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBukuLongitudinals instanceof PropelCollection) {
            $this->collBukuLongitudinals->clearIterator();
        }
        $this->collBukuLongitudinals = null;
        $this->aMataPelajaran = null;
        $this->aSekolah = null;
        $this->aTingkatPendidikan = null;
        $this->aJenisHapusBuku = null;
        $this->aRuang = null;
        $this->aBiblio = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BukuPeer::DEFAULT_STRING_FORMAT);
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
