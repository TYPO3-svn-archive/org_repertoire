plugin.tx_browser_pi1 {
  views {
    list {
      331 {
        filter {
          tx_org_cal {
            datetime < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            datetime {
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org_repertoire/locallang_db.xml:filter_phrase.schedule
                  }
                }
              }
              wrap = <span class="selectbox">|</span>
              order.field = uid
              area < plugin.tx_browser_pi1.displayList.master_templates.areas.sample_period
            }
          }
        }
      }
    }
  }
}