<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for TingkatBiblio Table
 */
class BaseTingkatBiblioTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.TingkatBiblioTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('tingkat_biblio');
        $this->setPhpName('TingkatBiblio');
        $this->setClassname('DataDikdas\\Model\\TingkatBiblio');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'tingkat_biblio_id');
        $this->setIsData(           1);
        $this->setCreateGrid(       1);
        $this->setCreateForm(       1);
        $this->setIsRef(            0);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         1);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    1);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'tingkat_biblio_id_str');
        $this->setHeader(           'Pustaka.tingkat Biblio');
        $this->setLabel(            'Pustaka.tingkat biblio');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       '');
        $this->setXtypeRadio(       '');
        $this->setXtypeList(        '');
        $this->setBelongsTo(array(  "Biblio"));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setCreateWinChildDelete(0);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'tingkat_biblio_id');
        $cvar->setColumnPhpName(    'TingkatBiblioId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              0);
        $cvar->setHeader(           ' ');
        $cvar->setLabel(            ' ');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       100);
        $cvar->setColumnWidth(      100);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       'tingkatbiblioid');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     1);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'id_biblio');
        $cvar->setColumnPhpName(    'IdBiblio');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '1');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Biblio');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       'bibliocombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'tingkat_pendidikan_id');
        $cvar->setColumnPhpName(    'TingkatPendidikanId');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'TingkatPendidikan');
        $cvar->setMin(              0);
        $cvar->setMax(              16);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       'tingkatpendidikancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'bentuk_pendidikan_id');
        $cvar->setColumnPhpName(    'BentukPendidikanId');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
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