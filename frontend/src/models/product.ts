export interface ProductData {
  name: string | null
  price: number | null,
  remark: string | null
  thumbnail_url: string | null
}

export class Product {
  name = ''
  price = null
  remark = ''
  thumbnail_url = ''

  constructor(initData?: Partial<Product>) {
    if(initData) {
      Object.assign(this, initData)
    }
  }
}