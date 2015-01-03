plugin.tx_browser_pi1 {
  views {
    single {
      331 {
        select (
          tx_org_repertoire.title,
          tx_org_repertoire.bodytext,
          tx_org_repertoire.deleted,
          tx_org_repertoire.description,
          tx_org_repertoire.image,
          tx_org_repertoire.imagecaption,
          tx_org_repertoire.imageseo,
          tx_org_repertoire.imagewidth,
          tx_org_repertoire.imageheight,
          tx_org_repertoire.imageorient,
          tx_org_repertoire.imagecols,
          tx_org_repertoire.imageborder,
          tx_org_repertoire.image_frames,
          tx_org_repertoire.image_link,
          tx_org_repertoire.image_zoom,
          tx_org_repertoire.image_noRows,
          tx_org_repertoire.image_effects,
          tx_org_repertoire.image_compression,
          tx_org_repertoire.keywords,
          tx_org_repertoire.length,
          tx_org_repertoire.producer,
          tx_org_repertoire.subtitle,
          tx_org_repertoire.staff,
          tx_org_repertoire.tx_org_cal,

          tx_org_cal.uid,
          tx_org_cal.datetime
        )
        orderBy (
          tx_org_repertoire.title
        )
      }
    }
  }
}