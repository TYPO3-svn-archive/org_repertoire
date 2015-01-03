plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        tx_org_cal {
          title {
            10 {
              XXX20 {
                  // link to tx_org_repertoire
                tx_org_repertoire < .default
              }
                // tx_org_cal.subtitle
              XXX21 {
                field := prependString(tx_org_repertoire.teaser_subtitle // tx_org_repertoire.subtitle // )
              }
              XXX30 >
                // image
              XXX39 {
                10 {
                  tx_org_repertoire < .default
                  tx_org_repertoire {
                    file.import.stdWrap.cObject.10.20.field := prependString(tx_org_repertoire.image // )
                    altText.field := prependString(tx_org_repertoire.imageseo // )
                    title.field := prependString(tx_org_repertoire.imageseo // )
                  }
                }
              }
              XXX40 {
                  // link to tx_org_repertoire
                tx_org_repertoire < .default
                tx_org_repertoire {
                  10 {
                    field := prependString(tx_org_repertoire.teaser_short // tx_org_repertoire.bodytext // )
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