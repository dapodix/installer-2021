<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for SumberAir Table
 */
class BaseSumberAirTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.SumberAirTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('sumber_air');
        $this->setPhpName('SumberAir');
        $this->setClassname('DataDikdas\\Model\\SumberAir');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'sumber_air_id');
        $this->setIsData(           0);
        $this->setCreateGrid(       0);
        $this->setCreateForm(       0);
        $this->setIsRef(            1);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         0);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'sumber_air_id_str');
        $this->setHeader(           'Ref.sumber Air');
        $this->setLabel(            'Ref.sumber air');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       'ref.sumberaircombo');
        $this->setXtypeRadio(       'ref.sumberairradio');
        $this->setXtypeList(        'ref.sumberairlist');
        $this->setHasMany(array(    ""));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    ""));
        $this->setCreateWinChildDelete(0);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'sumber_air_id');
        $cvar->setColumnPhpName(    'SumberAirId');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              12);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'nama');
        $cvar->setColumnPhpName(    'Nama');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Nama');
        $cvar->setLabel(            'Nama');
        $cvar->setInputLength(      25);
        $cvar->setFieldWidth(       75);
        $cvar->setColumnWidth(      135);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'textfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'sumber_air');
        $cvar->setColumnPhpName(    'SumberAir');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Sumber Air');
        $cvar->setLabel(            'Sumber air');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'numberfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'sumber_minum');
        $cvar->setColumnPhpName(    'SumberMinum');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Sumber Minum');
        $cvar->setLabel(            'Sumber minum');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'numberfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'expired_date');
        $cvar->setColumnPhpName(    'ExpiredDate');
        $cvar->setType(             'timestamp');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Expired Date');
        $cvar->setLabel(            'Expired date');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      100);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'datefield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;


        $this->setColumns($columns);
        /*
        $this->setTitle( "Fieldset Name" );
        $this->setGroupId( 1 );
        $this->setParentGroupId( 0 );
        $this->setGroupingMethod( 'fieldset' );
        */

    }

}