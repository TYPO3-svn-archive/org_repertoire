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
                  }
                }
                XXX10 {
                  renderObj {
                    default {
                      wrap = <li class="url expired">|</li>
                    }
                    notype {
                      wrap = <li class="url expired">|</li>
                    }
                      // link to internal page
                    page {
                      wrap = <li class="url expired">|</li>
                    }
                    url {
                      wrap = <li class="url expired">|</li>
                    }
                  }
                }
                wrap = <li class="tx_org_cal">|</li>
              }
            }
          }
        }
      }
    }
  }
}