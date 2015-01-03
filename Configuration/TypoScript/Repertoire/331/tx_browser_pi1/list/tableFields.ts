plugin.tx_browser_pi1 {
  views {
    list {
      331 {
        tx_org_cal {
          datetime = COA
          datetime {
            10 = TEXT
            10 {
              field = tx_org_cal.datetime
              strftime = %A, %d. %B, %H:%M
            }
            20 = TEXT
            20 {
              value = h
              lang {
                de = Uhr
                en = h
              }
              noTrimWrap = | ||
            }
          }
        }
        tx_org_repertoire {
            // teaser_short || bodytext, more
          teaser_short = COA
          teaser_short {
            required    = 1
            wrap        = <div class="repertoire_teasershort">|</div>
            20 = TEXT
            20 {
              required    = 1
              field       = tx_org_repertoire.teaser_short // tx_org_repertoire.bodytext
              stripHtml   = 1
              crop        = 200 | &nbsp;... | 1
            }
            30 = TEXT
            30 {
              value   = more &raquo;
              lang {
                de = mehr &raquo;
                en = more &raquo;
              }
              typolink {
                parameter {
                  cObject = COA
                  cObject {
                      // url
                    10 = TEXT
                    10 {
                      value = {$plugin.org.pages.repertoire}
                    }
                      // target
                    20 = TEXT
                    20 {
                      value       = -
                      //noTrimWrap  = | "|"|
                    }
                      // class
                    30 = TEXT
                    30 {
                      value       = internal-link
                      noTrimWrap  = | "|"|
                    }
                      // title
                    40 = TEXT
                    40 {
                      value = Repertoire
                      lang {
                        de = Repertoire
                        en = Repertoire
                      }
                      noTrimWrap  = | "|"|
                    }
                  }
                }
                additionalParams {
                  data  = GP:tx_browser_pi1|tx_org_repertoire.uid
                  wrap  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=|
                }
                useCacheHash = 1
              }
              noTrimWrap = | ||
            }
          }
          subtitle = TEXT
          subtitle {
            required  = 1
            field     = tx_org_repertoire.subtitle
            wrap      = <h3 class="repertoire_subtitle">|</h3>
          }
            // title, producer
          title = COA
          title {
            wrap = <h2 class="repertoire_title">|</h2>
            10 = TEXT
            10 {
              required  = 1
              field     = tx_org_repertoire.title
              typolink {
                parameter {
                  cObject = COA
                  cObject {
                      // url
                    10 = TEXT
                    10 {
                      value = {$plugin.org.pages.repertoire}
                    }
                      // target
                    20 = TEXT
                    20 {
                      value       = -
                      //noTrimWrap  = | "|"|
                    }
                      // class
                    30 = TEXT
                    30 {
                      value       = internal-link
                      noTrimWrap  = | "|"|
                    }
                      // title
                    40 = TEXT
                    40 {
                      value = Repertoire
                      lang {
                        de = Repertoire
                        en = Repertoire
                      }
                      noTrimWrap  = | "|"|
                    }
                  }
                }
                additionalParams {
                  data  = GP:tx_browser_pi1|tx_org_repertoire.uid
                  wrap  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=|
                }
                useCacheHash = 1
              }
            }
            20 = COA
            20 {
              if {
                isTrue {
                  field = tx_org_repertoire.producer
                }
              }
              10 = TEXT
              10 {
                value = by
                lang {
                  de  = von
                  en  = by
                }
                noTrimWrap = || |
              }
              20 = TEXT
              20 {
                field = tx_org_repertoire.producer
              }
              stdWrap {
                noTrimWrap = | <span class="repertoire_producer">|</span>|
              }
            }
          }
        }
      }
    }
  }
}