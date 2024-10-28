# Planejamento projeto to-do

## Entidades:

- **Usuário**
- **Tarefas**
- **Categorias**

## Relacionamentos:

- ### Usuário x Tarefas:
    - Um usuário pode ter várias tarefas (1-N)
    - Uma tarefa pertence a um único usuário (1-1)

- ### Trefas x Categorias:
    - Uma categoria pode ter várias tarefas (1-N)
    - Uma tarefa pertence a uma única categorias (1-1)

- ### Usuário x Categorias:
    - Um usuário pode ter várias categorias (1-N)
    - Uma categoria pertence a um único usuário (1-1)

## Detalhamento das entidades:

- **Usuário:**
    - Padrao do Laravel

- **Tarefas:**
    - id
    - titulo
    - descrição
    - data de criação
    - data de conclusão
    - status
    - categoria_id
    - user_id

- **Categorias:**
    - id
    - nome
    - cor
    - user_id