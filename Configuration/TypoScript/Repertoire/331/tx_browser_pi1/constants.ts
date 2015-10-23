plugin.tx_browser_pi1 {
  navigation {
    showUid = repertoireUid
  }

  templates {
    listview {
      header {
        0 {
          field   = tx_org_repertoire.teaser_title // tx_org_repertoire.title
        }
      }
      image {
        0 {
          default   = EXT:org_repertoire/Resources/Public/Images/Default/org_repertoire_defaults_300x200.png
          file      = tx_org_repertoire.image
          height    = 95c
          path      = uploads/tx_org/
          seo       = tx_org_repertoire.imageseo
          width     = 95c
        }
      }
      text {
        0 {
          crop    = 200 | ... | 1
          field   = tx_org_repertoire.teaser_short // tx_org_repertoire.bodytext
        }
      }
      url {
        0 {
          key       = tx_org_repertoire.type // type
          page      = tx_org_repertoire.page // page
          record    = tx_org_repertoire.uid  // uid
          showUid   = repertoireUid
          #singlePid =
          url       = tx_org_repertoire.url // url
        }
      }
    }
    singleview {
      image {
        0 {
          caption     = tx_org_repertoire.imagecaption
          file        = tx_org_repertoire.image
          height      = tx_org_repertoire.imageheight
          imagecols   = tx_org_repertoire.imagecols
          imageorient = tx_org_repertoire.imageorient
          path        = uploads/tx_org/
          seo         = tx_org_repertoire.imageseo
          width       = tx_org_repertoire.imagewidth
          zoom        = tx_org_repertoire.image_zoom
        }
      }
      text {
        0 {
          header    = tx_org_repertoire.title
          bodytext  = tx_org_repertoire.bodytext // tx_org_repertoire.teaser_short
        }
      }
    }
  }
}