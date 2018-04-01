<?php

class Ingredient extends Base
{
	public function list($request, $response, $args)
	{
		$sql = "SELECT 
					id,
					name,
					plural
				FROM ingredients
				ORDER BY name";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();

		$data['ingredients'] = $stmt->fetchAll();

		return $this->render($response, $data);
	}

	public function edit($request, $response, $args)
	{
		$data = array();
		if (array_key_exists('id', $args)) {
			$data['id'] = $args['id'];

			$sql = "SELECT 
						id,
						name,
						plural
                    FROM ingredients
                    WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute(["id" => $args['id']]);

			$data['ingredient'] = $stmt->fetch();
		}

		return $this->render($response, $data);
	}

	public function save($request, $response, $args)
	{
		$post = $request->getParsedBody();

		$plural = NULL;
		if ($post['plural'] != '') {
			$plural = $post['plural'];
		}

		if ($post['id']) {
			$id = $post['id'];

			$sql = "UPDATE ingredients
					SET 
						name = :name,
						plural = :plural
					WHERE id = :id";
			$stmt = $stmt = $this->db->prepare($sql);
			$result = $stmt->execute([
				'name' => $post['name'],
				'plural' => $plural,
				'id' => $id,
			]);
		} else {
			$sql = "INSERT INTO ingredients (
						name,
						plural
					) VALUES (
						:name,
						:plural
					)";
			$stmt = $stmt = $this->db->prepare($sql);
			$result = $stmt->execute([
				'name' => $post['name'],
				'plural' => $plural,
			]);
		}

		return $response->withHeader('Location', $this->baseUrl . 'ingredienten');
	}
}