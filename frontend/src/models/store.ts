export interface StoreData {
  name: string | null
  category: string | null
  postalcode1: string | null
  postalcode2: string | null
  prefecture: string | null
  city: string | null
  town: string | null
  addressRemark: string | null
  period1: string | null
  period2: string | null
  opening_hours: string | null
  closing_time: string | null
  remark: string | null
}

export class Store {
  name = ''
  category = ''
  postalcode1 = ''
  postalcode2 = ''
  prefecture = ''
  city = ''
  town = ''
  addressRemark = ''
  period1 = ''
  period2 = ''
  opening_hours = ''
  closing_time = ''
  remark = ''

  constructor(initData?: Partial<Store>) {
    if(initData) {
      Object.assign(this, initData)
    }
  }
}