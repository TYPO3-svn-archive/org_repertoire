plugin.tx_browser_pi1 {
  views {
    list {
      331 {
        filter {
          tx_org_repertoiretargetgroup {
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title {
              count_hits = 0
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:filter_phrase.tx_org_repertoiretargetgroup
                  }
                }
              }
              wrap = <span class="selectbox">|</span>
            }
          }
          tx_org_staff {
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title {
              count_hits = 0
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:filter_phrase.tx_org_staff
                  }
                }
              }
              wrap = <span class="selectbox">|</span>
            }
          }
        }
      }
    }
  }
}