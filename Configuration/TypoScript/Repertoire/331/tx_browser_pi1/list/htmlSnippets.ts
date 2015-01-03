plugin.tx_browser_pi1 {
  views {
    list {
      331 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###TX_ORG_CAL.DATETIME###
              </div>
)
            }
          }
          subparts {
            listview = TEXT
            listview {
              value (
                <div class="row">
                  <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="columns listview listview-content listview-###MODE### listview-content-###MODE###">
                    <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                    <div class="row">
                      <div class="columns record">
                        <div class="image01">
                          ###TX_ORG_REPERTOIRE.IMAGE###
                        </div>
                        <div class="sbmFloatRight">
                          ###SOCIALMEDIA_BOOKMARKS###
                        </div>
                        ###TX_ORG_REPERTOIRE.SUBTITLE###
                        ###TX_ORG_REPERTOIRE.TITLE###
                        ###TX_ORG_REPERTOIRE.TEASER_SHORT###
                      </div>
                    </div><!-- /row --><!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
                  </div><!-- /columns --><!-- /listview -->
                </div><!-- /row -->
)
            }
          }
        }
      }
    }
  }
}