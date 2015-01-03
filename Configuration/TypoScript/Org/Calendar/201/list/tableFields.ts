plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        tx_org_cal {
          title {
            10 {
              20 {
                tx_org_repertoire <  plugin.tx_browser_pi1.views.list.201.tx_org_cal.title.10.20.tx_org_event
              }
                // tx_org_cal.subtitle
              21 {
                field := prependString(tx_org_repertoire.teaser_subtitle // tx_org_repertoire.subtitle // )
              }
            }
          }
        }
      }
    }
  }
}