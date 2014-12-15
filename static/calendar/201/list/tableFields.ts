plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        tx_org_cal {
          title {
            10 {
              20 {
                  // link to tx_org_repertoire
                tx_org_repertoire < .default
              }
                // image
              39 {
                10 {
                  tx_org_repertoire < .default
                  tx_org_repertoire {
                    file.import.stdWrap.cObject.10.20.field := prependString(tx_org_repertoire.image // )
                    altText.field := prependString(tx_org_repertoire.imageseo // )
                    title.field := prependString(tx_org_repertoire.imageseo // )
                  }
                }
              }
              40 {
                  // link to tx_org_repertoire
                tx_org_repertoire < .default
              }
            }
              // margin: datesheet
            20 {
              10 {
                  // 10: date isn't expired
                10 {
                    // name of weekday
                  10 {
                    tx_org_repertoire < .default
                  }
                    // day of month as number
                  20 < .10
                  20 {
                    tx_org_repertoire {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                  }
                    // month year
                  30 < .10
                  30 {
                    tx_org_repertoire {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                    url {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                  }
                }
                  // 20: date is expired
                20 < .10
                20 {
                  if {
                    negate = 1
                  }
                  wrap = <ul class="vcard datesheet datesheet_expired">|</ul><!-- vcard -->
                }
              }
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}