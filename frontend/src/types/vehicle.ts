import { categoryType } from "./category"

export type bookType = {
    id: string
    nome: string
    marca: string
    ano: number
    imagem: string
    categoria: categoryType
    quantidade: number
}