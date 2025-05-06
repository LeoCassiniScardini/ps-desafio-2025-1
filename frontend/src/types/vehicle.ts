import { categoryType } from "./category"

export type vehicleType = {
    id: string
    nome: string
    marca: string
    ano: number
    imagem: string
    categoria: categoryType
    quantidade: number
    created_at: Date
    updated_at: Date
}