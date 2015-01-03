plugin.tx_browser_pi1 {
  views {
    single {
      331 = +Org-Repertoire: Repertoire
      331 {
        marker < plugin.tx_browser_pi1.marker
        marker {
          my_listview_page = TEXT
          my_listview_page {
            value = All Repertoire &raquo;
            lang.de = Alle St&uuml;cke &raquo;
            typolink {
              parameter = {$plugin.org.pages.repertoire}
              title {
                value = The whole repertoire
                lang {
                  de = Repertoire und alle St&uuml;cke
                  en = The whole repertoire
                }
              }
            }
          }
          my_singleview_title = TEXT
          my_singleview_title {
            value   = Repertoire
            lang {
              de = Repertoire
              en = Repertoire
            }
            wrap    = <div class="header01">|</div>
          }
        }
      }
    }
  }
}