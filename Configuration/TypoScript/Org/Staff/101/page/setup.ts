page {
  config {
    headerComment (
        TYPO3-Programmierung: die-netzmacher.de
)
  }
  jsFooterInline {
      // Included by org_repertoire/Configuration/TypoScript/Org/Staff/101/page/setup.ts
    71132 = TEXT
    71132 {
      value (

        /* EXT:org/Configuration/TypoScript/staff/101/page/setup.ts */
        var labelTxOrgRepertoireMore  = "More &raquo;";
        var labelTxOrgRepertoireLess  = "Less &laquo;";
        var lnDeTxOrgRepertoireMore   = "Mehr &raquo;";
        var lnDeTxOrgRepertoireLess   = "Weniger &laquo;";

        var htmlLang = $( "html" ).attr( "lang" ).substr( 0, 2 );

        if( htmlLang === "de" ) {
          labelTxOrgRepertoireMore  = lnDeTxOrgRepertoireMore;
          labelTxOrgRepertoireLess  = lnDeTxOrgRepertoireLess;
        }

        $( document ).ready( function( )
        {
          if( $( "ul.tx_org_repertoire li.toggle" ).length > 0 )
          {
            $( ".tx_org_repertoire_toggle" ).show( );
            $( ".tx_org_repertoire_toggle" ).html( labelTxOrgRepertoireMore );
          }

          $( ".tx_org_repertoire_toggle" ).click( function() {
            $( "ul.tx_org_repertoire li.toggle" ).toggle( "slow", function() {
              if( $( "ul.tx_org_repertoire li.toggle" ).css( "display" ) === "none" )
              {
                $( ".tx_org_repertoire_toggle" ).html( labelTxOrgRepertoireMore ).blur();
              }
              else
              {
                $( ".tx_org_repertoire_toggle" ).html( labelTxOrgRepertoireLess ).blur();
              }
            });
          });
        });
)
    }
  }
}