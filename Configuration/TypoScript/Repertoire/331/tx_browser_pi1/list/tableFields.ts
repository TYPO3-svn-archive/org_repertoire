plugin.tx_browser_pi1 {
  views {
    list {
      331 {
          // title
        tx_org_repertoire =
        tx_org_repertoire {
            // content, margin
          title = COA
          title {
              // content: bookmarks, title, tx_org_repertoirecat.title, teaser_short, location
            10 = COA
            10 {
                // image
              10 = COA
              10 {
                  // image
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
                wrap = <div class="columns medium-2 large-2">|</div>
              }
                // text
              20 = COA
              20 {
                  // socialmedia_bookmarks
                10 = TEXT
                10 {
                  value = ###SOCIALMEDIA_BOOKMARKS###
                  wrap = <div style="float:right;">|</div>
                }
                  // title: default, notype, page, url, tx_org_repertoire
                20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
                  // tx_org_repertoire.subtitle
                21 = TEXT
                21 {
                  field = tx_org_repertoire.teaser_subtitle // tx_org_repertoire.subtitle
                  wrap = <h3>|</h3>
                  required = 1
                }
                  // teaser_short: default, notype, page, url, tx_org_repertoire
                40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
                wrap = <div class="columns medium-10 large-10">|</div>
              }
            }
          }
        }
      }
    }
  }
}