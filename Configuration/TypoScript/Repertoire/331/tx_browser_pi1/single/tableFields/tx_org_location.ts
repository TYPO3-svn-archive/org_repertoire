plugin.tx_browser_pi1 {
  views {
    single {
      331 {
        tx_org_repertoire {
          title {
            40 {
              20 {
                20 {
                  renderObj {
                    default {
                      30 >
                        // city, location
                      30 = COA
                      30 {
                          // city
                        10 = TEXT
                        10 {
                          field = uid
                          noTrimWrap = |, cal-uid: | (for city)|
                        }
                          location
                        20 = TEXT
                        20 {
                          value = location name
                          noTrimWrap = |, ||
                        }
                      }
                    }
                    notype {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    page {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    url {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                  }
                }
                10 {
                  renderObj {
                    default {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    notype {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                      // link to internal page
                    page {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    url {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}