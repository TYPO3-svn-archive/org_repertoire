plugin.tx_browser_pi1 {

  template {
    add_parameter {
      extensions {
        org_repertoire = COA
        org_repertoire {
            // repertoireUid
          10 = TEXT
          10 {
            dataWrap        = &tx_browser_pi1[repertoireUid]={GPvar:tx_browser_pi1|repertoireUid}&###CHASH###
            if.isTrue.data  = GPvar:tx_browser_pi1|repertoireUid
          }
        }
      }
    }
  }

  views {
    list {
      331 = +Org: Repertoire
      331 {
        name    = +Org: Repertoire
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
        navigation < plugin.tx_browser_pi1.navigation
        navigation {
          map {
            enabled = disabled
          }
        }
      }
    }
    single {
      331 = +Org: Repertoire
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org_repertoire/Configuration/TypoScript/Repertoire/331/tx_browser_pi1/marker.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org_repertoire/Configuration/TypoScript/Repertoire/331/tx_browser_pi1/list/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org_repertoire/Configuration/TypoScript/Repertoire/331/tx_browser_pi1/single/_setup.ts">